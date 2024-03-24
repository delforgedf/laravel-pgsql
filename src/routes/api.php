<?php

use App\Http\Controllers\Api\UnidadesController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

Route::get('/unidades', [UnidadesController::class, 'getAllUnidades'])->name('unidades');

Route::get('/deficit_habitacional', [UnidadesController::class, 'getDeficit'])->name('unidades');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
