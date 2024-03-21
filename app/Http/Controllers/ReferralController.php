<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\View\View;

class ReferralController extends Controller
{
    /**
     * Display a listing of referrals.
     */
    public function index(): View
    {
        $referrals = Referral::latest()->paginate(10);

        return view('referral.index', compact('referrals'));
    }
}
