<?php

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

Route::post('/company', [App\Http\Controllers\Api\Company\PostCreateCompanyController::class, '__invoke']);
Route::PATCH('/company/{id}', [App\Http\Controllers\Api\Company\PathUpdateStateCompanyController::class, '__invoke']);
Route::GET('/company', [App\Http\Controllers\Api\Company\GetIndexCompanyController::class, '__invoke']);
