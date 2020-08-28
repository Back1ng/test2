<?php


namespace App\Database\Repositories;


use App\Database\Entities\PartnerTypesReference;

class PartnerTypesReferenceRepository extends Repository
{
    protected PartnerTypesReference $entity;

    protected string $tableName = "partner_types_reference";

    /**
     * @param PartnerTypesReference $entity
     * @return $this
     */
    public function setEntity(PartnerTypesReference $entity): PartnerTypesReferenceRepository
    {
        $this->entity = $entity;

        return $this;
    }
}