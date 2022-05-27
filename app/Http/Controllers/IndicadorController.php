<?php namespace App\Http\Controllers;

use App\Business\IndicadorBusiness;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class IndicadorController extends WebController {

	public function api($indicador)
	{
		$return = $this->getIndicador($indicador)->expose();
		return response()->json($return);
	}


	public function show($indicador)
	{
		$indicador = $this->getIndicador($indicador);

		return view('indicador')
			->with('indicador',$indicador);

	}

	private function getIndicador($indicador){
		$class = 'App\Business\IndicadorBusiness';
		$indexToFind = strtoupper($indicador);

		if(!isset($class::$$indexToFind)){
			self::indexNotFound($indexToFind);
		}
		$indicadorBusiness = new IndicadorBusiness(IndicadorBusiness::$$indexToFind);
		$indicador = $indicadorBusiness->getUltimoIndiceXML();
		return $indicador;
	}

	public function indexNotFound($index){
		echo "Index not found: " . $index;
	}

}
