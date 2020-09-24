<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Kenotariatan\AktaController;
use App\Http\Controllers\Kenotariatan\NotarisController;
use App\Http\Controllers\Kenotariatan\LaporanController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/logout', [UserController::class, 'logout']);

    // Route::apiResource('akta', AktaController::class);
    // Route::apiResource('notaris', NotarisController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [UserController::class, 'show']);
    Route::apiResource('akta', AktaController::class);
    Route::apiResource('notaris', NotarisController::class);
    // Route::post('notaris/{id}',  [NotarisController::class, 'update']);

    Route::apiResource('laporan', LaporanController::class);
});

