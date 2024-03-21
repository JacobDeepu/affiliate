<?php

use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/affiliate', [AffiliateController::class, 'index'])
        ->name('affiliate.index');

    Route::put('/affiliate/{affiliate}', [AffiliateController::class, 'verify'])
        ->name('affiliate.verify');

    Route::get('/referral', [ReferralController::class, 'index'])
        ->name('referral.index');
});

Route::middleware([
    'guest:web',
])->group(function () {
    Route::get('/register', [AffiliateController::class, 'create'])
        ->name('affiliate.create');
    Route::post('/register', [AffiliateController::class, 'store'])
        ->name('affiliate.store');
});

Route::resource('role', RoleController::class)
    ->middleware(['auth:sanctum', 'permission:view a role|create a role|update a role|delete a role'])
    ->except('show');
