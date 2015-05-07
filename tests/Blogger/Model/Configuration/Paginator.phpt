<?php

/**
 * Test: Model\Configuration\Paginator
 */

use Minetro\Blog\Simple\Model\Configuration\Paginator;
use Tester\Assert;

require __DIR__ . '/../../../bootstrap.php';

test(function() {
    $perPage = 10;
    $paginator = Paginator::factory($perPage);

    Assert::type('Nette\Utils\Paginator', $paginator);
    Assert::equal($perPage, $paginator->itemsPerPage);
});
