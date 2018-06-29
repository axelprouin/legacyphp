<?php

namespace App\Infrastructure\Repository;

use App\Domain\Repository\CollectionRepository as DomaineCollectionRepository;
use PDO;

final class CollectionRepository implements DomaineCollectionRepository
{

    /**
     * @var PDO
     */
    private $dbCoonection;

    public function __construct(PDO $dbCoonection)
    {

        $this->dbCoonection = $dbCoonection;
    }

    /**
     * @return array
     */
    public function findAll()
    {
        $sql = "SELECT * FROM collection ORDER BY titre";
        return $this->dbCoonection->query($sql)->fetchAll();
    }
}