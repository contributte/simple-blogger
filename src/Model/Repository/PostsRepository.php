<?php

namespace Minetro\Blog\Simple\Model\Repository;

use Minetro\Blog\Simple\Collector\ICollector;
use Minetro\Blog\Simple\Model\Entity\Collection;
use Nette\Caching\Cache;
use Nette\Caching\IStorage;

/**
 * Posts Repository
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
final class PostsRepository
{

    /** Cache keys */
    const CACHE_NAMESPACE = 'Blog';
    const CACHE_COLLECTION = 'Blog.posts';
    const CACHE_POST = 'Blog.post';

    /** @var ICollector */
    private $collector;

    /** @var Cache */
    private $cache;

    /**
     * @param ICollector $collector
     * @param IStorage $cacheStorage
     */
    public function __construct(ICollector $collector, IStorage $cacheStorage)
    {
        $this->collector = $collector;
        $this->cache = new Cache($cacheStorage, self::CACHE_NAMESPACE);
    }

    /**
     * @return Collection
     */
    public function getAll()
    {
        $collection = $this->cache->load(self::CACHE_COLLECTION, function (&$dependencies) {
            $dependencies[Cache::TAGS] = ['blog', 'posts'];
            $dependencies[Cache::EXPIRATION] = '+24 hour';

            return $this->collector->collect();
        });

        return $collection;
    }

}