<?php

class NavigationTest extends TestCase {

	public function testHome()
	{
		$response = $this->call('GET', '/');
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testAbout()
	{
		$response = $this->call('GET', '/about');
		$this->assertEquals(200, $response->getStatusCode());
	}

}