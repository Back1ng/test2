<?php


namespace App\Database\Entities;


class Address implements Entity
{
    public ?int $id = null;

    public Street $street;

    public string $house_number;

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
     * @return Address
     */
    public function setId(int $id): Address
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Street
     */
    public function getStreet(): Street
    {
        return $this->street;
    }

    /**
     * @param Street $street
     * @return Address
     */
    public function setStreet(Street $street): Address
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return string
     */
    public function getHouseNumber(): string
    {
        return $this->house_number;
    }

    /**
     * @param string $house_number
     * @return Address
     */
    public function setHouseNumber(string $house_number): Address
    {
        $this->house_number = $house_number;

        return $this;
    }
}