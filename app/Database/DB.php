<?php


namespace App\Database;


class DB
{
    private static ?\PDO $_instance = null;

    private function __construct()
    {
        try {
            self::$_instance = new \PDO(DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",
                DB_USERNAME, DB_PASSWORD);
            self::$_instance->setAttribute(
                \PDO::ATTR_ERRMODE,
                \PDO::ERRMODE_EXCEPTION
            );
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }


    public static function getInstance()
    {
        new self();
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        return new self();
    }

    /**
     * @param int|null $id
     * @return array
     */
    public static function getRows(int $id = null): array
    {
        $sql = "
            SELECT p.id, p.name as partner_name, 
            t.name as partner_type, 
            c_from.name as city_from, 
            s_from.name as street_from, 
            a_from.house_number address_from, 
            c_to.name as city_to,
            s_to.name as street_to, 
            a_to.house_number as address_to, 
            m.name as manager
            FROM partner p
            inner join partner_types_reference t on p.type_id = t.id
            inner join address a_from on p.address_from_id = a_from.id
            inner join address a_to on p.address_to_id = a_to.id
            inner join street s_from on a_from.street_id = s_from.id
            inner join street s_to on a_to.street_id = s_to.id
            inner join city c_from on s_from.city_id = c_from.id
            inner join city c_to on s_to.city_id = c_to.id
            inner join manager m on p.manager_id = m.id
        ";
        if ($id !== null) {
            $sql .= "WHERE p.id = :id";
        }

        $sth = self::$_instance->prepare($sql);

        if ($id !== null) {
            $sth->bindValue(":id", $id);
        }
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}