<?php

namespace App\Business;

use Serializable;

class PreferencesVO
{

	const PREFERENCES_AMOUNT = 'preferences_amount';
	const PREFERENCES_PERIOD = 'preferences_period';
	const PREFERENCES_TAXCDB = 'preferences_taxcdb';
	const PREFERENCES_TAXLCI = 'preferences_taxlci';
	const PREFERENCES_LIFESPAN = 20160;
	const DEFAULT_AMOUNT = 1000;
	const DEFAULT_PERIOD = 12;
	const DEFAULT_TAXCDB = 83;
	const DEFAULT_TAXLCI = 91;
	private $amount;
	private $period;
	private $taxcdb;
	private $taxlci;

	/**
	 * @return mixed
	 */
	public function getAmount()
	{
		return $this->amount;
	}

	/**
	 * @param mixed $amount
	 */
	public function setAmount($amount)
	{
		$this->amount = $amount;
	}

	/**
	 * @return mixed
	 */
	public function getPeriod()
	{
		return $this->period;
	}

	/**
	 * @param mixed $period
	 */
	public function setPeriod($period)
	{
		$this->period = $period;
	}

	/**
	 * @return mixed
	 */
	public function getTaxCdb()
	{
		return $this->taxcdb;
	}

	/**
	 * @param mixed $taxcdb
	 */
	public function setTaxCdb($taxcdb)
	{
		$this->taxcdb = $taxcdb;
	}

	/**
	 * @return mixed
	 */
	public function getTaxLci()
	{
		return $this->taxlci;
	}

	/**
	 * @param mixed $taxlci
	 */
	public function setTaxLci($taxlci)
	{
		$this->taxlci = $taxlci;
	}
}