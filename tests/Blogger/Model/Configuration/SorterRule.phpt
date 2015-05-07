<?php

/**
 * Test: Model\Configuration\SorterRule
 */

use Minetro\Blog\Simple\Model\Configuration\SorterRule;
use Tester\Assert;

require __DIR__ . '/../../../bootstrap.php';

test(function() {
    $p = 'property1';
    $d = SorterRule::DESCENDING;
    $rule = new SorterRule($p, $d);

    Assert::same($p, $rule->getProperty());
    Assert::same($d, $rule->getDirection());

    Assert::true($rule->isDescending());
    Assert::false($rule->isAscending());
});
