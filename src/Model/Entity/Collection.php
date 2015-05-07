<?php

namespace Minetro\Blog\Simple\Model\Entity;

use Nette\Object;

/**
 * Collection
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
final class Collection extends Object
{

    /** @var Post[] */
    private $posts = [];

    /**
     * GETTERS/SETTERS *********************************************************
     * *************************************************************************
     */

    /**
     * @param Post $post
     */
    public function add(Post $post)
    {
        $this->posts[] = $post;
    }

    /**
     * @return Post[]
     */
    public function getAll()
    {
        return $this->posts;
    }

    /**
     * FILTERING ***************************************************************
     * *************************************************************************
     */

    /**
     * @param $callback
     * @return array
     */
    public function filter($callback)
    {
        return array_filter($this->posts, $callback);
    }

    /**
     * SORTING *****************************************************************
     * *************************************************************************
     */

    /**
     * @param $callback
     */
    public function sort($callback)
    {
        uasort($this->posts, $callback);
    }
}
