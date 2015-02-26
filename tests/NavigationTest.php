<?php

class NavigationTest extends TestCase
{

	public function testHome()
	{
		$this->call('GET', '/');
		$this->assertResponseOk();
		$this->assertViewHas('poupanca');
		$this->assertViewHas('cdi');
	}

	public function testSobre()
	{
		$this->call('GET', '/sobre');
		$this->assertResponseOk();
	}

}