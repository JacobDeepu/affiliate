<?php

use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\RoleController;
use App\Services\ReferralService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/', [ReferralController::class, 'register'])
    ->name('referral.register');

Route::get('/', function (Request $request) {
    $cookie = ReferralService::setReferralTokenCookie($request);
    if ($cookie) {
        return redirect('/')->cookie($cookie);
    }

    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $referrals = ReferralService::getReferrals(auth()->user());

        return view('dashboard', compact('referrals'));
    })->name('dashboard');

    Route::get('/affiliate', [AffiliateController::class, 'index'])
        ->name('affiliate.index');

    Route::put('/affiliate/{affiliate}', [AffiliateController::class, 'verify'])
        ->name('affiliate.verify');

    Route::get('/affiliate/{affiliate}', [AffiliateController::class, 'show'])
        ->name('affiliate.show');

    Route::resource('referral', ReferralController::class)
        ->only(['index', 'edit', 'update', 'destroy']);
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
