<?php

namespace Minetro\Blog\Simple\Model\Entity;

/**
 * PostMeta
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
final class PostMeta extends Base
{

    /** @var array */
    private $tags = [];

    /** @var bool */
    private $comments;

    /** @var string */
    private $social;

    /** @var int */
    private $truncate;

    /** @var string */
    private $parser;

    /**
     * GETTERS/SETTERS *********************************************************
     * *************************************************************************
     */

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return string $tag
     */
    public function addTag($tag)
    {
        $this->tags[] = $tag;
    }

    /**
     * @param array $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return boolean
     */
    public function isComments()
    {
        return $this->comments;
    }

    /**
     * @param boolean $comments
     */
    public function setComments($comments)
    {
        $this->comments = boolval($comments);
    }

    /**
     * @return string
     */
    public function getParser()
    {
        return $this->parser;
    }

    /**
     * @param string $parser
     */
    public function setParser($parser)
    {
        $this->parser = $parser;
    }

    /**
     * @return string
     */
    public function getSocial()
    {
        return $this->social;
    }

    /**
     * @param string $social
     */
    public function setSocial($social)
    {
        $this->social = $social;
    }

    /**
     * @return int
     */
    public function getTruncate()
    {
        return $this->truncate;
    }

    /**
     * @param int $truncate
     */
    public function setTruncate($truncate)
    {
        $this->truncate = intval($truncate);
    }

}
