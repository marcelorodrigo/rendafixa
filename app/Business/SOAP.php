<?php
namespace App\Business;
class SOAP extends \SOAPClient
{
	private static $instance;

	private function SOAP($url)
	{
		return parent::__construct($url);
	}

	public static function getInstance($data)
	{
		if (empty(self::$instance)) {
			self::$instance = new SOAP($data);
		}
		return self::$instance;
	}

	public function call($configuration)
	{
		return parent::__soapCall($configuration[0], $configuration[1]);
	}
}