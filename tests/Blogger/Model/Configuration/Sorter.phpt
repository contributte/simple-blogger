<?php

/**
 * Test: Model\Configuration\Sorter
 */

use Minetro\Blog\Simple\Model\Configuration\Sorter;
use Minetro\Blog\Simple\Model\Configuration\SorterRule;
use Tester\Assert;

require __DIR__ . '/../../../bootstrap.php';

test(function() {
    $sorter = new Sorter();

    Assert::false($sorter->hasRules());
});

test(function() {
    $sorter = new Sorter();

    $p = 'p1';
    $d = SorterRule::DESCENDING;

    $sorter->createRule($p, $d);

    Assert::true($sorter->hasRules());
    Assert::same($p, $sorter->getRules()[0]->getProperty());
    Assert::same($d, $sorter->getRules()[0]->getDirection());
});

test(function() {
    $sorter = new Sorter();

    $p = 'p1';
    $d = SorterRule::DESCENDING;

    $sorter->addRule(new SorterRule($p, $d));

    Assert::true($sorter->hasRules());
    Assert::same($p, $sorter->getRules()[0]->getProperty());
    Assert::same($d, $sorter->getRules()[0]->getDirection());
});

test(function() {
    $p = 'p1';
    $d = SorterRule::DESCENDING;

    $sorter = Sorter::factory([$p => $d]);

    Assert::count(1, $sorter->getRules());
});

test(function() {
    $sorter = new Sorter();
    $p = 'p1';

    $sorter->createRule($p, TRUE);
    Assert::true($sorter->getRules()[0]->isDescending());

    $sorter->createRule($p, 'DESC');
    Assert::true($sorter->getRules()[1]->isDescending());

    $sorter->createRule($p, SorterRule::DESCENDING);
    Assert::true($sorter->getRules()[1]->isDescending());
});
