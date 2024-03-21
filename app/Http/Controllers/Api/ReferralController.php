<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReferralController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'min:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'course' => ['nullable', 'string', 'max:255'],
        ]);

        $referrer_id = User::where('referral_token', $request->referral_token)->pluck('id')->first();

        Referral::create([
            'referrer_id' => $referrer_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'course' => $request->course,
        ]);

        return response('success', 200);
    }
}
