<?php

namespace Minetro\Blog\Simple\Model\Configuration;

use Nette\Object;

/**
 * Sorter
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 *
 * @property-read SorterRule[] $rules
 */
class Sorter extends Object
{

    /** @var SorterRule[] */
    private $rules = [];

    /**
     * @param string $property
     * @param mixed $direction
     */
    public function createRule($property, $direction = SorterRule::DESCENDING)
    {
        $direction = is_bool($direction)
            ? ($direction == TRUE ? SorterRule::DESCENDING : SorterRule::ASCENDING)
            : ($direction == SorterRule::ASCENDING ? SorterRule::ASCENDING : SorterRule::DESCENDING);
        $this->rules[] = new SorterRule($property, $direction);
    }

    /**
     * @param SorterRule $rule
     */
    public function addRule(SorterRule $rule)
    {
        $this->rules[] = $rule;
    }

    /**
     * @return SorterRule[]
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @return bool
     */
    public function hasRules()
    {
        return count($this->rules) > 0;
    }

    /**
     * FACTORIES ***************************************************************
     * *************************************************************************
     */

    /**
     * @param array $rules
     * @return Sorter
     */
    public static function factory(array $rules = [])
    {
        $inst = new Sorter();

        foreach ($rules as $column => $asc) {
            $inst->createRule($column, $asc);
        }

        return $inst;
    }

}
