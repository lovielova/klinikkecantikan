<?php
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\GraphQLController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/treatments', TreatmentController::class);
Route::post('/graphql', [GraphQLController::class, 'query']);
