<?php


namespace App\Database\Repositories;


use App\Database\Entities\Manager;

class ManagerRepository extends Repository
{
    protected Manager $entity;

    protected string $tableName = "manager";

    /**
     * @param Manager $entity
     * @return $this
     */
    public function setEntity(Manager $entity): ManagerRepository
    {
        $this->entity = $entity;

        return $this;
    }
}