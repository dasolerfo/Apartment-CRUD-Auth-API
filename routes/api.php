<?php

use App\Http\Controllers\ApartamentController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



//Route::apiResource('platform', PlatformController::class);

Route::post('/auth/register', [AuthController::class, 'register']);

Route::get('/apartament/apartaments_rented/{rented}', [ApartamentController::class, 'apartamentsRented']);
Route::get('/apartament/apartaments_premium', [ApartamentController::class, 'apartamentsPremium']);
Route::get('/platform/{idPlatform}', [PlatformController::class, 'platform']);


Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('apartament', ApartamentController::class);
    Route::get('/me', function (Request $request) {
        return auth()->user();
    });

    Route::post('/auth/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
