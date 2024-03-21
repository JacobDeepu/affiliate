<?php

use App\Http\Controllers\Api\ReferralController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/referral', [ReferralController::class, 'store'])
    ->name('referral.store');
