<?php

namespace App\Business;
use SoapFault;

class SOAP extends \SOAPClient
{
    private static SOAP $instance;

    /**
     * @throws SoapFault
     */
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
