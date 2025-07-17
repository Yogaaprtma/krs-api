<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\AuthController;

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

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/students/{nim}/krs/current', [KrsController::class, 'currentKrs']);
    Route::get('/students/{nim}/courses/available', [KrsController::class, 'availableCourses']);
    Route::post('/students/{nim}/krs/courses', [KrsController::class, 'registerCourse']);
    Route::delete('/students/{nim}/krs/courses/{schedule_id}', [KrsController::class, 'removeCourse']);

    Route::get('/students/{nim}/krs/status', [KrsController::class, 'krsStatus']);
});