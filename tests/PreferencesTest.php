<?php

class PreferencesTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();
		Session::start();
	}

	public function testStorePreferences()
	{

		$_token = csrf_token();
		$amount = 1;
		$period = 2;
		$taxcdb = 3;
		$taxlci = 4;
		$this->call('POST', '/preferences', compact('amount', 'period', 'taxcdb', 'taxlci', '_token'));
		$this->assertResponseOk();
	}

}