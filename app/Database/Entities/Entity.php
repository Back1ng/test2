<?php


namespace App\Database\Entities;


interface Entity
{
    public function hasId(): bool;
    public function getId(): int;
    public function setId(int $id): Entity;
}