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

	public function testIndicadorSelic()
	{
		$response = $this->call('GET', '/indicador/selic');
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testIndicadorIPCS()
	{
		$response = $this->call('GET', '/indicador/ipca');
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testIndicadorIGPM()
	{
		$response = $this->call('GET', '/indicador/igpm');
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testIndicadorTR()
	{
		$response = $this->call('GET', '/indicador/tr');
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testIndicadorPoupanca()
	{
		$response = $this->call('GET', '/indicador/poupanca');
		$this->assertEquals(200, $response->getStatusCode());
	}

}