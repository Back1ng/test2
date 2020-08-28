<?php


namespace App\Database\Repositories;


use App\Database\DB;
use App\Database\Entities\Entity;

abstract class Repository
{
    protected string $tableName;

    /**
     * Активное соединение с базой данных
     *
     * @var \PDO
     */
    protected ?\PDO $connection;

    /**
     * Создание подключения с помощью класса одиночки
     * @param Entity|null $entity
     */
    public function __construct(?Entity $entity = null)
    {
        if($entity !== null) {
            $this->entity = $entity;

        }
        $this->connection = DB::getInstance();
    }

    /**
     * Поиск по идентификатору записи
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): array
    {
        $sth = $this->connection->prepare("SELECT * FROM {$this->tableName} WHERE id = :id");
        $sth->bindValue(":id", $id);
        $sth->execute();
        return $sth->fetch();
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        $sth = $this->connection->prepare("SELECT * FROM {$this->tableName}");
        $sth->execute();
        return $sth->fetchAll();
    }

    /**
     * Содержит автоматическую генерацию строки под соответствующие ключи в массиве
     *
     * @param array $data
     * @return mixed
     */
    public function selectWhere(array $data)
    {
        $values = "";

        foreach ($data as $key => $value) {
            if($value === null) continue;
            $values === "" ? $values .= "{$key} = :$key" : $values .= " and {$key} = :$key";
        }

        $sth = $this->connection->prepare("SELECT * FROM `{$this->tableName}` WHERE {$values}");

        foreach ($data as $key => $value) {
            if ($value === null) continue;
            $sth->bindValue(':' . $key, $value);
        }

        $sth->execute();

        return $sth->fetch();
    }

    /**
     * Вставляет новые записи в зависимости от существующих ключей в массиве
     *
     * @param array $data
     * @return mixed
     */
    public function insert(array $data)
    {
        $values = "";

        foreach ($data as $key => $value) {
            $values === "" ? $values .= ":" . $key : $values .= ", :" . $key;
        }

        $sth = $this->connection->prepare("INSERT INTO `{$this->tableName}` VALUES({$values})");

        foreach ($data as $key => $value) {
            $sth->bindValue(':' . $key, $value);
        }

        $sth->execute();

        return $this->selectWhere($data);
    }

    /**
     * Сохраняет объект в базу данных
     *
     * @return Entity
     */
    public function save(): Entity
    {
        $data = $this->validate($this->entity);

        $fetch = $this->selectWhere($data);

        if ($fetch === false) {
            $fetch = $this->insert($data);
        }

        return $this->entity->setId(
            (int) $fetch['id']
        );
    }

    public function update(): Entity
    {
        $data = $this->validate($this->entity);

        $fetch = $this->selectWhere($data);
    }

    public function delete(int $id)
    {
        $sth = $this->connection->prepare("
            DELETE FROM {$this->tableName}
            WHERE id = :id
        ");
        $sth->bindValue(":id", $id);
        return $sth->execute();
    }

    /**
     * Проходит поля объекта и собирает их в массив.
     *
     * @param Entity $entity
     * @return array
     */
    public function validate(Entity $entity) : array
    {
        $data = [];

        foreach ($entity as $key => $value) {
            if ($value instanceof Entity) {
                $data[$key."_id"] = $value->getId();
            } else {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}