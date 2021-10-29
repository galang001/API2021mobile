<?php
use App\Http\Controllers\API\phonecontroller;
use App\Http\Controllers\API\brandcontroller;
use App\Http\Controllers\API\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[AuthController::class,'login']);
Route::resource('phone',phonecontroller::class);
Route::resource('brand',brandcontroller::class);
Route::post('/phone/{id_phone}',[phonecontroller::class,'update']);
