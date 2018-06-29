<?php

namespace App\Infrastructure\Repository;



use App\Domain\Repository\CollectionRepository;
use Psr\Cache\CacheItemPoolInterface;

final class CacheCollectionRepository implements CollectionRepository
{

    /**
     * @var CollectionRepository
     */
    private $collectionRepository;
    /**
     * @var CacheItemPoolInterface
     */
    private $cache;

    public function __construct(CollectionRepository $collectionRepository, CacheItemPoolInterface $cache)
    {

        $this->collectionRepository = $collectionRepository;
        $this->cache = $cache;
    }

    /**
     * @return array
     */
    public function findAll()
    {
        if ($this->cache->hasItem('collection.all')) {
            return $this->cache->getItem('collection.all')->get();
        }
        $data = $this->collectionRepository->findAll();
        $this->cache->save($this->cache->getItem('collection.all')->expiresAfter(60)->set($data));
        return $data;
    }
}