<?php


namespace App\Database\Entities;


class Manager implements Entity
{
    public ?int $id = null;

    public string $name;

    public function hasId(): bool
    {
        return $this->id === null ? false : true;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Manager
     */
    public function setId(int $id): Manager
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Manager
     */
    public function setName(string $name): Manager
    {
        $this->name = $name;

        return $this;
    }
}