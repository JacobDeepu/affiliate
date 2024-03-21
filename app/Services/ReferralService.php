<?php

namespace App\Services;

use App\Models\Referral;

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
}
