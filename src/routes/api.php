<?php

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

Route::get('/users', function (Request $request) {
    $object = [
        (object) [
            'id' => 546,
            'username' => 'John',
        ],
        (object) [
            'id' => 894,
            'username' => 'Mary',
        ],
        (object) [
            'id' => 326,
            'username' => 'Jane',
        ]
    ];

    return response()->json($object);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
