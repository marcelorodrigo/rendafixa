<?php
namespace App\Business;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;

class IndicadorBusiness
{
	private $url;
	private $serieCode;

	public static $SELIC = 1178;
	public static $CDI = 4389;
	public static $IPCA = 433;
	public static $IGPM = 189;
	public static $INPC = 188;
	public static $IBOV = 7;
	public static $CAMBIO = 1;
	public static $TR = 226;
	public static $POUPANCA = 195;
	const BACEN_WSDL_URL = "https://www3.bcb.gov.br/sgspub/JSP/sgsgeral/FachadaWSSGS.wsdl";

	public function __construct($serieCode = 0)
	{
		$this->url = self::BACEN_WSDL_URL;
		$this->serieCode = $serieCode;
	}

	private function getData($configuration){
		$soapResult = $this->soap($configuration);
		return $this->mapToIndicadorVO($soapResult);
	}

	private function soap($conf)
	{
		$proxy = $this->getProxyConfiguration();
		$client = SOAP::getInstance($this->url, $proxy);
		$soapCallResult = $client->call($conf);
		return $soapCallResult;
	}

	private function mapToIndicadorVO($xmlData){
		$returned = simplexml_load_string($xmlData);
		$day = (int) $returned->SERIE->DATA->DIA;
		$month = (int) $returned->SERIE->DATA->MES;
		$year = (int) $returned->SERIE->DATA->ANO;

		$indicador = new IndicadorVO();
		$indicador
			->setName(mb_convert_encoding($returned->SERIE->NOME,'ISO-8859-1','UTF-8'))
			->setDate(new \DateTime("$year-$month-$day"))
			->setValue($returned->SERIE->VALOR)
			->setUnit($returned->SERIE->UNIDADE);
		return $indicador;
	}

	/**
	 *Soma o indice dos ultimos 12 meses
	 * @access public
	 * @param type XML retornado da função soap
	 * @return A soma dos indices
	 */
	public function sumLast12Months($xml)
	{
		$total = 1;
		foreach ($xml->SERIE->ITEM as $item) {
			$total = (float) $total * ( (float) ((float) $item->VALOR / 100) + 1);
		}
		return ($total - 1) * 100;
	}

	/**
	 *
	 * @return type XML contendo o ultimo indice do IGP-M
	 */
	public function getUltimoIndiceXML()
	{
		$cacheKey = 'index' . $this->serieCode;
		$value = Cache::get($cacheKey, null);

		if($value == null){
			$conf[0] = 'getUltimoValorXML';
			$conf[1] = array('codigoSerie' => $this->serieCode);
			$value = $this->getData($conf);
			Cache::put($cacheKey, $value, Config::get('INDEX_CACHE_TIMEOUT', 120));
		}

		return $value;


	}
	/**
	 *
	 * @return type Os indices dos ultimos 12 meses em formato XML
	 */
	public function getUltimos12Meses()
	{
		$month = date('m');
		$year = date('Y');
		$dateBegin = date("d/m/Y", strtotime("-12 month", mktime(0, 0, 0, $month, 01, $year)));
		$dateEnd = date("d/m/Y", mktime(0, 0, 0, $month + 1, 0, $year));
		$conf[0] = 'getValoresSeriesXML';
		$conf[1] = array('codigoSeries' => array($this->serieCode), 'dataInicio' => $dateBegin, 'dataFim' => $dateEnd);
		return $this->soap($conf);
	}

	private function getProxyConfiguration()
	{
		$proxy = array(
			'proxy_host' => "10.192.38.86",
			'proxy_port' => 80,
			'proxy_login' => "c090762@CORPCAIXA",
			'proxy_password' => "Ro3648");
		return $proxy;
	}
}