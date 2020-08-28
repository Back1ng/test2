<?php


namespace App\Database\Repositories;


use App\Database\Entities\City;

class CityRepository extends Repository
{
    protected City $entity;

    protected string $tableName = "city";

    /**
     * @param City $entity
     * @return $this
     */
    public function setEntity(City $entity): CityRepository
    {
        $this->entity = $entity;

        return $this;
    }
}