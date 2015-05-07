<?php

/**
 * Test: Model\Configuration\Criteria
 */

use Minetro\Blog\Simple\Model\Configuration\Criteria;
use Tester\Assert;

require __DIR__ . '/../../../bootstrap.php';

test(function() {
    $criteria = new Criteria();

    Assert::count(0, $criteria->getCriteria());
    Assert::false($criteria->hasCriteria());
    Assert::null($criteria->getCriterion('a'));
});

test(function() {
	$k = 'a';
	$v = 'v';
    $criteria = Criteria::factory([$k => $v]);

    Assert::count(1, $criteria->getCriteria());
    Assert::true($criteria->hasCriteria());
    Assert::equal($v, $criteria->getCriterion($k));
});

test(function() {
	$k = 'a';
	$v = 'v';
    $criteria = new Criteria();

    $criteria->add($k, $v);

    Assert::count(1, $criteria->getCriteria());
});
