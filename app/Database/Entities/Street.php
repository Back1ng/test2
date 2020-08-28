<?php


namespace App\Database\Entities;


class Street implements Entity
{
    public ?int $id = null;

    public City $city;

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
     * @return Street
     */
    public function setId(int $id): Street
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return City
     */
    public function getCity(): City
    {
        return $this->city;
    }

    /**
     * @param City $city
     * @return Street
     */
    public function setCity(City $city): Street
    {
        $this->city = $city;

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
     * @return Street
     */
    public function setName(string $name): Street
    {
        $this->name = $name;

        return $this;
    }
}