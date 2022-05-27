<?php

namespace App\Http\Controllers;

use App\Business\IndicadorBusiness;
use App\Business\PreferencesVO;
use Illuminate\Http\Request;

class WelcomeController extends WebController
{

	public function index(Request $request)
	{
		$indicadorCDI = new IndicadorBusiness(IndicadorBusiness::$CDI);
		$cdi = $indicadorCDI->getUltimoIndiceXML()->getValue();

		$indicadorPoupanca = new IndicadorBusiness(IndicadorBusiness::$POUPANCA);
		$poupanca = $indicadorPoupanca->getUltimoIndiceXML()->getValue();

		$indicadorSELIC = new IndicadorBusiness(IndicadorBusiness::$SELIC);
		$selic = $indicadorSELIC->getUltimoIndiceXML()->getValue();

		$amount = $request->cookie(PreferencesVO::PREFERENCES_AMOUNT, PreferencesVO::DEFAULT_AMOUNT);
		$period = $request->cookie(PreferencesVO::PREFERENCES_PERIOD, PreferencesVO::DEFAULT_PERIOD);
		$taxcdb = $request->cookie(PreferencesVO::PREFERENCES_TAXCDB, PreferencesVO::DEFAULT_TAXCDB);
		$taxlci = $request->cookie(PreferencesVO::DEFAULT_TAXLCI, PreferencesVO::DEFAULT_TAXLCI);

		return view('welcome', compact('cdi', 'poupanca', 'selic', 'amount', 'period', 'taxcdb', 'taxlci'));
	}


}
