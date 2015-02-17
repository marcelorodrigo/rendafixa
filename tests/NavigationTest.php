<?php

class NavigationTest extends TestCase {

	public function testHome()
	{
		$response = $this->call('GET', '/');
		$this->assertEquals(200, $response->getStatusCode());
	}

}