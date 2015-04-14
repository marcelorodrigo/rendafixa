<?php namespace App\Http\Controllers;

use App\Business\PreferencesVO;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;

class PreferencesController extends Controller
{

	public function store()
	{
		$preferences = Request::all();
		$response = new Response('OK');
		$response
			->withCookie(Cookie::forever(PreferencesVO::PREFERENCES_AMOUNT, $preferences['amount'], PreferencesVO::PREFERENCES_LIFESPAN))
			->withCookie(Cookie::forever(PreferencesVO::PREFERENCES_PERIOD, $preferences['period'], PreferencesVO::PREFERENCES_LIFESPAN))
			->withCookie(Cookie::forever(PreferencesVO::PREFERENCES_TAXCDB, $preferences['taxcdb'], PreferencesVO::PREFERENCES_LIFESPAN))
			->withCookie(Cookie::forever(PreferencesVO::PREFERENCES_TAXLCI, $preferences['taxlci'], PreferencesVO::PREFERENCES_LIFESPAN));

		return $response;
	}
}