<?php

use App\Http\Controllers\Api\v1\EpisodeController;
use App\Http\Controllers\Api\v1\NationController;
use App\Http\Controllers\Api\v1\GenreController;
use App\Http\Controllers\Api\v1\FilmController;
use App\Http\Controllers\Api\v1\LoginController;
use App\Http\Controllers\Api\v1\SignupController;
use App\Http\Controllers\Api\v1\MunicipalityController;
use App\Http\Controllers\Api\v1\SerieController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\IVACalculate;
use App\Http\Controllers\Api\v1\SeasonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

if(!defined('_VERS')){
    define('_VERS', 'v1');
}

Route::post(_VERS.'/signup', [SignupController::class, 'signup']);
Route::get(_VERS.'/login/{user}', [LoginController::class, 'controlloUtente']);
Route::get(_VERS.'/login/{user}/{hash}', [LoginController::class, 'controlloPassword']);

//UTENTE
Route::middleware(['authentication', 'userrole:Utente,Admin'])->group(function(){
    //UTENTE
    Route::get(_VERS.'/users/{user}', [UserController::class, 'show']);
    Route::put(_VERS.'/users/{user}', [UserController::class, 'update']);

    //GENERI
    Route::get(_VERS.'/genres', [GenreController::class, 'index']);
    Route::get(_VERS.'/genres/{genre}', [GenreController::class, 'show']);

    //FILM
    Route::get(_VERS.'/films', [FilmController::class, 'index']);
    Route::get(_VERS.'/films/{film}', [FilmController::class, 'show']);

    //SERIE
    Route::get(_VERS.'/series', [SerieController::class, 'index']);
    Route::get(_VERS.'/series/{serie}', [SerieController::class, 'show']);

    //STAGIONI
    Route::get(_VERS.'/seasons', [SeasonController::class, 'index']);
    Route::get(_VERS.'/seasons/{season}', [SeasonController::class, 'show']);

    //EPISODI
    Route::get(_VERS.'/episodes', [EpisodeController::class, 'index']);
    Route::get(_VERS.'/episodes/{episode}', [EpisodeController::class, 'show']);
});

//ADMIN
Route::middleware(['authentication', 'userrole:Admin'])->group(function(){
    //NAZIONI
    Route::get(_VERS.'/nations', [NationController::class, 'index']);

    //COMUNI
    Route::get(_VERS.'/municipalities', [MunicipalityController::class, 'index']);

    //UTENTI
    Route::get(_VERS.'/users', [UserController::class, 'index']);
    Route::post(_VERS.'/users', [UserController::class, 'store']);
    Route::delete(_VERS.'/users/{user}', [UserController::class, 'destroy']);

    //GENERI
    Route::post(_VERS.'/genres', [GenreController::class, 'store']);
    Route::put(_VERS.'/genres/{genre}', [GenreController::class, 'update']);
    Route::delete(_VERS.'/genres/{genre}', [GenreController::class, 'destroy']);

    //FILM
    Route::post(_VERS.'/films', [FilmController::class, 'store']);
    Route::put(_VERS.'/films/{film}', [FilmController::class, 'update']);
    Route::delete(_VERS.'/films/{film}', [FilmController::class, 'destroy']);

    //SERIE
    Route::post(_VERS.'/series', [SerieController::class, 'store']);
    Route::put(_VERS.'/series/{serie}', [SerieController::class, 'update']);
    Route::delete(_VERS.'/series/{serie}', [SerieController::class, 'destroy']);

    //STAGIONI
    Route::post(_VERS.'/seasons', [SeasonController::class, 'store']);
    Route::put(_VERS.'/seasons/{season}', [SeasonController::class, 'update']);
    Route::delete(_VERS.'/seasons/{season}', [SeasonController::class, 'destroy']);

    //EPISODI
    Route::post(_VERS.'/episodes', [EpisodeController::class, 'store']);
    Route::put(_VERS.'/episodes/{episode}', [EpisodeController::class, 'update']);
    Route::delete(_VERS.'/episodes/{episode}', [EpisodeController::class, 'destroy']);
});
