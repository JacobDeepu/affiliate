<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\User;
use App\Services\ReferralService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReferralController extends Controller
{
    /**
     * Display a listing of referrals.
     */
    public function index(): View
    {
        $referrals = ReferralService::getReferrals(auth()->user());

        return view('referral.index', compact('referrals'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Referral $referral)
    {
        return view('referral.edit', compact('referral'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Referral $referral): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'min:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'course' => ['nullable', 'string', 'max:255'],
        ]);

        $referrer_id = User::where('referral_token', $request->referral_token)->pluck('id')->first();

        $referral->update([
            'referrer_id' => $referrer_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'course' => $request->course,
        ]);

        return redirect()->route('referral.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Referral $referral): RedirectResponse
    {
        $referral->delete();

        return redirect()->route('referral.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'min:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'course' => ['nullable', 'string', 'max:255'],
            'branch' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
        ]);

        $referral_token = ReferralService::getReferralTokenCookie($request);

        $referrer_id = User::where('referral_token', $referral_token)->pluck('id')->first();

        Referral::create([
            'referrer_id' => $referrer_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'course' => $request->course,
            'branch' => $request->branch,
            'location' => $request->location,
        ]);

        return redirect()->away(config('custom.external_url'));
    }
}
