<?php


namespace App\Database\Repositories;


use App\Database\Entities\Street;

class StreetRepository extends Repository
{
    protected Street $entity;

    protected string $tableName = "street";

    /**
     * @param Street $entity
     * @return $this
     */
    public function setEntity(Street $entity): StreetRepository
    {
        $this->entity = $entity;

        return $this;
    }
}