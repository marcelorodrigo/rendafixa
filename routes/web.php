<?php

use App\Http\Controllers\PreferencesController;
use App\Http\Controllers\RentabilidadeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
const NEW_WEBSITE = 'https://rendafixa.github.io/';
const INDICADOR_REGEX = '[A-Za-z]+';

Route::get('/', function () {
    return redirect(NEW_WEBSITE, 301);
});
Route::get('/rentabilidade', [RentabilidadeController::class, 'index']);
Route::get('indicador/{indicador}', function () {
    return redirect(NEW_WEBSITE, 301);
})
    ->where('indicador', INDICADOR_REGEX);

Route::get('sobre', function () {
    return redirect(NEW_WEBSITE . 'sobre/', 301);
});

Route::get('novo', function () {
    return view('novo');
});

Route::get('info', function () {
    phpinfo();
});

Route::post('preferences', [PreferencesController::class, 'store']);

Route::get('api/{indicador}', function () {
    return redirect(NEW_WEBSITE, 301);
})
    ->where('indicador', INDICADOR_REGEX);

Route::get('indicador/{indicador}/json', function () {
    return redirect(NEW_WEBSITE, 301);
})
    ->where('indicador', INDICADOR_REGEX);
