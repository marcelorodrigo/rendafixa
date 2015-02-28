<?php
namespace App\Business;

use App\Utils\Numeric;

class IndicadorVO
{

	private $name;
	private $date;
	private $value;
	private $unit;
	private $updated;

	public function getDate()
	{
		return $this->date;
	}

	public function setDate($date)
	{
		$this->date = $date;
		return $this;
	}


	public function getValue()
	{
		return $this->value;
	}

	public function setValue($value)
	{
		$this->value = Numeric::toFloat($value);
		return $this;
	}

	public function getUnit()
	{
		return $this->unit;
	}

	public function setUnit($unit)
	{
		$this->unit = (String)$unit;
		return $this;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = (String)$name;
		return $this;
	}

	public function getUpdated()
	{
		return $this->updated;
	}


	public function setUpdated($updated)
	{
		$this->updated = $updated;
		return $this;
	}

	public function expose()
	{
		return get_object_vars($this);
	}

}