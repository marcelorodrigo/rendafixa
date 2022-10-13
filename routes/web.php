<?php

use App\Http\Controllers\IndicadorController;
use App\Http\Controllers\PreferencesController;
use App\Http\Controllers\RentabilidadeController;
use App\Http\Controllers\WelcomeController;
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
Route::get('/', [WelcomeController::class, 'index']);
Route::get('/rentabilidade', [RentabilidadeController::class, 'index']);
Route::get('indicador/{indicador}', [IndicadorController::class, 'show'])
    ->where('indicador', '[A-Za-z]+');

Route::get('sobre', function () {
    return redirect('https://rendafixa.github.io/sobre', 301);
});

Route::get('novo', function () {
    return view('novo');
});

Route::get('info', function () {
    phpinfo();
});

Route::post('preferences', [PreferencesController::class, 'store']);

Route::get('api/{indicador}', [IndicadorController::class, 'api'])
    ->where('indicador', '[A-Za-z]+');

Route::get('indicador/{indicador}/json', [IndicadorController::class, 'api'])
    ->where('indicador', '[A-Za-z]+');
