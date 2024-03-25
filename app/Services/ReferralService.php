<?php

namespace App\Services;

use App\Models\Referral;
use Illuminate\Http\Request;

class ReferralService
{
    public static function getReferrals($user)
    {
        if ($user->hasRole('Super Admin') || $user->hasRole('Admin')) {
            $referrals = Referral::latest()->paginate(10);
        } else {
            $referrals = $user->referrals()->latest()->paginate(10);
        }

        return $referrals;
    }

    public static function setReferralTokenCookie(Request $request)
    {
        $cookie = '';
        if ($request->query('ref')) {
            $cookie = cookie('referral_token', $request->query('ref'), 60);
        }

        return $cookie;
    }

    public static function getReferralTokenCookie(Request $request)
    {
        $referral_token = $request->cookie('referral_token');

        return $referral_token;
    }
}
