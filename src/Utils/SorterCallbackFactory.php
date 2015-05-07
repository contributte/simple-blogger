<?php

namespace Minetro\Blog\Simple\Utils;

use Minetro\Blog\Simple\Model\Configuration\SorterRule;
use Nette\InvalidArgumentException;

/**
 * Sorter Callback Factory
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
class SorterCallbackFactory
{

    /**
     * @param SorterRule $rule
     * @return \Closure
     * @throws InvalidArgumentException
     */
    public static function createProperty($rule)
    {
        return function ($a, $b) use ($rule) {
            $res = strcmp($a->{$rule->property}, $b->{$rule->property});
            return $rule->isAscending() ? $res : -1 * $res;
        };
    }

    /**
     * @param array|SorterRule[] $properties
     * @return \Closure
     * @throws InvalidArgumentException
     */
    public static function createProperties(array $rules)
    {
        if (!is_array($rules) || count($rules) <= 0) {
            throw new InvalidArgumentException("Properties have to be non empty array.'");
        }

        $rindex = 0;
        $fn = function ($a, $b) use (&$rindex, $rules, &$fn) {
            $rule = $rules[$rindex];
            $res = strcmp($a->{$rule->property}, $b->{$rule->property});

            if ($res == 0 && isset($rules[$rindex + 1])) {
                $rindex++;
                $res = $fn($a, $b);
                $rindex = 0;
                return $res;
            } else {
                return $rule->isAscending() ? $res : -1 * $res;
            }
        };

        return $fn;
    }
}