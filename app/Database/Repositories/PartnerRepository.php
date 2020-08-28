<?php


namespace App\Database\Repositories;


use App\Database\Entities\Partner;

class PartnerRepository extends Repository
{
    protected Partner $entity;

    protected string $tableName = "partner";

    /**
     * @param Partner $entity
     * @return $this
     */
    public function setEntity(Partner $entity): PartnerRepository
    {
        $this->entity = $entity;

        return $this;
    }
}