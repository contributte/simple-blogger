<?php

namespace Minetro\Blog\Simple\Model\Entity;

/**
 * PostSeo
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
final class PostSeo extends Base
{

    /** @var string */
    private $title;

    /** @var string */
    private $keywords;

    /** @var string */
    private $description;

    /**
     * GETTERS/SETTERS *********************************************************
     * *************************************************************************
     */

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
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}
