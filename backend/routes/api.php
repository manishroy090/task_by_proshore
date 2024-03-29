<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuestionnairesController;
use App\Http\Controllers\Api\QuestionController;

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

});
Route::get('questionnaires', [QuestionnairesController::class, 'index']);
Route::post('questore', [QuestionnairesController::class, 'store']);
Route::get('questions', [QuestionController::class, 'questions']);
Route::post('questions/store', [QuestionController::class, 'store']);
// Route::post('')
