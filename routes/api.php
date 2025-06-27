<?php

use App\Http\Controllers\Api\TemperatureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/temperatura', [TemperatureController::class, 'store']);

Route::post('/debug', function(Request $request) {
    Log::info('Llego a /api/debug');
    Log::info('Headers:', $request->headers->all());
    Log::info('Body:', [$request->getContent()]);
    return response()->json(['status' => 'ok']);
});
