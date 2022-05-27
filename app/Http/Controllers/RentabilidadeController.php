<?php namespace App\Http\Controllers;

use App\Business\IndicadorBusiness;

class RentabilidadeController extends WebController
{

    public function index()
    {
        $indicadorCDI = new IndicadorBusiness(IndicadorBusiness::$CDI);
        $cdi = str_replace('.', ',', $indicadorCDI->getUltimoIndiceXML()->getValue());

        return view('rentabilidade', compact('cdi'));
    }

}
