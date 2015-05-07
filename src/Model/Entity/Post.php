<?php

namespace Minetro\Blog\Simple\Model\Entity;

use Nette\Utils\DateTime;

/**
 * Post
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
final class Post extends Base
{

    /** @var int */
    private $id;

    /** @var string */
    private $hash;

    /** @var string */
    private $slug;

    /** @var string */
    private $title;

    /** @var DateTime */
    private $date;

    /** @var string */
    private $perex;

    /** @var string */
    private $content;

    /** @var PostMeta */
    private $metadata;

    /** @var PostSeo */
    private $seo;

    /**
     * GETTERS/SETTERS *********************************************************
     * *************************************************************************
     */

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = intval($id);
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate($date)
    {
        $this->date = new DateTime($date);
    }

    /**
     * @return string
     */
    public function getPerex()
    {
        return $this->perex;
    }

    /**
     * @param string $perex
     */
    public function setPerex($perex)
    {
        $this->perex = $perex;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return PostMeta
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param PostMeta $metadata
     */
    public function setMetadata(PostMeta $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return PostSeo
     */
    public function getSeo()
    {
        return $this->seo;
    }

    /**
     * @param PostSeo $seo
     */
    public function setSeo(PostSeo $seo)
    {
        $this->seo = $seo;
    }
}