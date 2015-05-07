<?php

namespace Minetro\Blog\Simple\Model\Service;

use Minetro\Blog\Simple\Model\Configuration\Configuration;
use Minetro\Blog\Simple\Model\Entity\Post;
use Minetro\Blog\Simple\Model\Repository\PostsRepository;
use Minetro\Blog\Simple\Utils\SorterCallbackFactory;

/**
 * Posts Service
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
final class PostsService
{

    /** @var PostsRepository */
    private $repository;

    /**
     * @param PostsRepository $repository
     */
    public function __construct(PostsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Configuration $configuration
     * @return Post[]
     */
    public function findAll(Configuration $configuration = NULL)
    {
        $collection = $this->repository->getAll();

        $sorter = $configuration->getSorter();

        if ($sorter && $sorter->hasRules()) {
            $collection->sort(SorterCallbackFactory::createProperties($sorter->getRules()));
        }

        return $collection->getAll();
    }

    /**
     * @param Configuration $configuration
     * @return Post
     */
    public function fetch(Configuration $configuration)
    {
        $criteria = $configuration->getCriteria();
        $collection = $this->repository->getAll();

        if ($criteria && $criteria->hasCriteria()) {
            $posts = $collection->filter(function ($post) use ($criteria) {
                if (($id = $criteria->getCriterion('id'))) {
                    return $id == $post->id;
                }
                if (($hash = $criteria->getCriterion('hash'))) {
                    return $hash == $post->hash;
                }
            });
        } else {
            $posts = $collection->getAll();
        }

        if (!$posts || count($posts) <= 0) return NULL;
        return array_shift($posts);
    }
}