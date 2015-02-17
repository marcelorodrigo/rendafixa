<?php namespace App\Http\Controllers;

use App\Business\IndicadorBusiness;

class WelcomeController extends Controller {

	public function index()
	{
		$indicadorCDI = new IndicadorBusiness(IndicadorBusiness::$CDI);
		$cdi = $indicadorCDI->getUltimoIndiceXML()->getValue();

		$indicadorPoupanca = new IndicadorBusiness(IndicadorBusiness::$POUPANCA);
		$poupanca = $indicadorPoupanca->getUltimoIndiceXML()->getValue();

		return view('welcome', compact('cdi', 'poupanca'));
	}



}
