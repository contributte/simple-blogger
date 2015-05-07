<?php

namespace Minetro\Blog\Simple\Model\Configuration;

use Nette\Utils\Paginator as NPaginator;

/**
 * Paginator
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
class Paginator extends NPaginator
{

    /**
     * FACTORIES ***************************************************************
     * *************************************************************************
     */

    /**
     * @param int $itemsPerPage
     * @return Paginator
     */
    public static function factory($itemsPerPage = 10)
    {
        $inst = new Paginator();
        $inst->setItemsPerPage($itemsPerPage);

        return $inst;
    }

}
