<?php

use App\Http\Controllers\PolygonController;
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

Route::post('rectangles', [PolygonController::class, 'createRectangle']);
Route::post('triangles', [PolygonController::class, 'createTriangle']);
Route::get('total-area', [PolygonController::class, 'calculateTotalArea']);
