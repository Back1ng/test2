<?php


namespace App\Database\Entities;


class Partner implements Entity
{
    public ?int $id = null;

    public string $name;

    public PartnerTypesReference $type;

    public Address $address_from;

    public Address $address_to;

    public Manager $manager;

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
     * @return Partner
     */
    public function setId(int $id): Partner
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
     * @return Partner
     */
    public function setName(string $name): Partner
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param PartnerTypesReference $type
     * @return Partner
     */
    public function setType(PartnerTypesReference $type): Partner
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Address
     */
    public function getAddressFrom(): Address
    {
        return $this->address_from;
    }

    /**
     * @param Address $address_from
     * @return Partner
     */
    public function setAddressFrom(Address $address_from): Partner
    {
        $this->address_from = $address_from;

        return $this;
    }

    /**
     * @return Address
     */
    public function getAddressTo(): Address
    {
        return $this->address_to;
    }

    /**
     * @param Address $address_to
     * @return Partner
     */
    public function setAddressTo(Address $address_to): Partner
    {
        $this->address_to = $address_to;

        return $this;
    }

    /**
     * @return Manager
     */
    public function getManager(): Manager
    {
        return $this->manager;
    }

    /**
     * @param Manager $manager
     * @return Partner
     */
    public function setManager(Manager $manager): Partner
    {
        $this->manager = $manager;

        return $this;
    }
}