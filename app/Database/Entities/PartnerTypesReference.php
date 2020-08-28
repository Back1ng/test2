<?php


namespace App\Database\Entities;


class PartnerTypesReference implements Entity
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
     * @return PartnerTypesReference
     */
    public function setId(int $id): PartnerTypesReference
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
     * @return PartnerTypesReference
     */
    public function setName(string $name): PartnerTypesReference
    {
        $this->name = $name;

        return $this;
    }
}