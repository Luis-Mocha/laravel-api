<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TypeController;
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

// da utilizzare per il login nel frontend
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// localhost:8000/api
// localhost:8000/api/projects
Route::get('/projects', [ProjectController::class, 'index']);

Route::get('/projects/{slug}', [ProjectController::class, 'show']);


// route::apiResource('/types', TypeController::class);
Route::get('/types', [TypeController::class, 'index']);
