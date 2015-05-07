<?php

/**
 * Test: Model\Configuration\Configuration
 */

use Minetro\Blog\Simple\Model\Configuration\Configuration;
use Tester\Assert;

require __DIR__ . '/../../../bootstrap.php';

test(function() {
    $c = new Configuration();

    Assert::null($c->getCriteria());
    Assert::null($c->getSorter());
    Assert::null($c->getPaginator());
});

test(function() {
    $c = new Configuration();

    $c->setCriteria($criteria = $c->createCriteria());
    $c->setSorter($sorter = $c->createSorter());
    $c->setPaginator($paginator = $c->createPaginator());

    Assert::same($criteria, $c->getCriteria());
    Assert::same($sorter, $c->getSorter());
    Assert::same($paginator, $c->getPaginator());
});

test(function() {
    $c = Configuration::factory();

    Assert::null($c->getCriteria());
    Assert::null($c->getSorter());
    Assert::null($c->getPaginator());
});

test(function() {
    $c = new Configuration();
    $criteria = $c->createCriteria();
    $sorter = $c->createSorter();
    $paginator = $c->createPaginator();

    $c = Configuration::factory($criteria, $paginator, $sorter);

    Assert::same($criteria, $c->getCriteria());
    Assert::same($sorter, $c->getSorter());
    Assert::same($paginator, $c->getPaginator());
});
