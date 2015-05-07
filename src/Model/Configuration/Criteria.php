<?php

namespace Minetro\Blog\Simple\Model\Configuration;

use Nette\Object;

/**
 * Criteria
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 *
 * @property-read array $criteria
 */
class Criteria extends Object
{

    /** @var array */
    private $criteria = [];

    /**
     * @param string $key
     * @param string $value
     */
    public function add($key, $value)
    {
        $this->criteria[$key] = $value;
    }

    /**
     * @return array
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * @param string $key
     * @return string
     */
    public function getCriterion($key)
    {
        if (array_key_exists($key, $this->criteria)) {
            return $this->criteria[$key];
        } else {
            return NULL;
        }
    }

    /**
     * @return bool
     */
    public function hasCriteria()
    {
        return count($this->criteria) > 0;
    }

    /**
     * FACTORIES ***************************************************************
     * *************************************************************************
     */

    /**
     * @param array $criteria
     * @return Criteria
     */
    public static function factory(array $criteria = [])
    {
        $inst = new Criteria();

        foreach ($criteria as $key => $value) {
            $inst->add($key, $value);
        }

        return $inst;
    }

}
