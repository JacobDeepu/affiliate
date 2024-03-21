<?php

use App\Http\Controllers\AffiliateController;
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
});

Route::middleware([
    'guest:web',
])->group(function () {
    Route::get('/register', [AffiliateController::class, 'create'])
        ->name('affiliate.create');
    Route::post('/register', [AffiliateController::class, 'store'])
        ->name('affiliate.store');
});
