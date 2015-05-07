<?php

namespace Minetro\Blog\Simple\Utils;

use Nette\Utils\Strings;

/**
 * Content Processor
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
class ContentProcessor
{

    const PAGEBREAK = '\<\!\-\-\s*pagebreak\s*\-\-\>';

    /**
     * @param string $content
     * @param string $pagebreak
     */
    public static function parse($content, $pagebreak = self::PAGEBREAK)
    {
        $matches = Strings::match($content, "#(.*)$pagebreak(.*)#s");
        return $matches ? [$matches[1], $matches[0]] : NULL;
    }
}