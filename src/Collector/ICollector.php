<?php

namespace Minetro\Blog\Simple\Collector;

use Minetro\Blog\Simple\Model\Entity\Collection;

/**
 * Collector Interface
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
interface ICollector
{
    /**
     * @return Collection
     */
    function collect();
}
