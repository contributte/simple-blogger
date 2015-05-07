<?php

namespace Minetro\Blog\Simple\Model\Configuration;

use Nette\Object;

/**
 * Sorter Rule
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 *
 * @property-read string $property
 * @property-read string $direction
 */
class SorterRule extends Object
{

	const ASCENDING = 'ASC';
	const DESCENDING = 'DESC';

	/** @var string */
	private $property;

	/** @var string */
	private $direction;

	/**
	 * @param string $property
	 * @param string $direction
	 */
	public function __construct($property, $direction = self::DESCENDING)
	{
		$this->property = $property;
		$this->direction = $direction;
	}

	/**
	 * @return string
	 */
	public function getProperty()
	{
		return $this->property;
	}

	/**
	 * @return string
	 */
	public function getDirection()
	{
		return $this->direction;
	}

	/**
	 * @return bool
	 */
	public function isAscending()
	{
		return $this->direction == self::ASCENDING;
	}

	/**
	 * @return bool
	 */
	public function isDescending()
	{
		return $this->direction == self::DESCENDING;
	}

}
