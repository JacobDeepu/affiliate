<?php

namespace App\Http\Controllers;

use App\Mail\AffiliateRegistered;
use App\Models\Affiliate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $affiliate->update(['verified' => true]);

        return redirect()->back();
    }
}
