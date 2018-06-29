<?php

namespace App\Domain\Repository;

interface CollectionRepository
{
    /**
     * @return array
     */
    public function findAll();
}