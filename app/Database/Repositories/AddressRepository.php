<?php


namespace App\Database\Repositories;


use App\Database\Entities\Address;

class AddressRepository extends Repository
{
    protected Address $entity;

    protected string $tableName = "address";

    /**
     * @param Address $entity
     * @return $this
     */
    public function setEntity(Address $entity): AddressRepository
    {
        $this->entity = $entity;

        return $this;
    }
}