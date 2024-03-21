<?php

namespace App\Http\Controllers;

use App\Mail\AffiliateRegistered;
use App\Mail\AffiliateVerified;
use App\Models\Affiliate;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AffiliateController extends Controller
{
    /**
     * Display a listing of affiliates.
     */
    public function index(): View
    {
        $affiliates = Affiliate::latest()->paginate(10);

        return view('affiliate.index', compact('affiliates'));
    }

    /**
     * Show the registration view.
     */
    public function create(): View
    {
        return view('affiliate.create');
    }

    /**
     * Create a new affiliate.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:10', 'max:13'],
            'location' => ['required', 'string', 'max:255'],
        ]);

        $affiliate = Affiliate::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'location' => $request['location'],
            'verified' => false,
        ]);

        Mail::to(config('custom.admin_mail'))->send(new AffiliateRegistered($affiliate));

        return redirect()->back()->banner('Registration Successful. Please Wait for Verification.');
    }

    /**
     * Create a new affiliate.
     */
    public function verify(Affiliate $affiliate): RedirectResponse
    {
        $password = Str::password(8, true, true, false, false);

        $user = User::create([
            'name' => $affiliate['name'],
            'email' => $affiliate['email'],
            'password' => Hash::make($password),
        ]);

        $affiliate->user_id = $user->id;
        $affiliate->verified = true;
        $affiliate->save();

        Mail::to($affiliate->email)->send(new AffiliateVerified($affiliate, $password));

        return redirect()->back();
    }
}
