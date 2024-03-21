<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AffiliateController extends Controller
{
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

        Affiliate::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'location' => $request['location'],
            'verified' => false,
        ]);

        return redirect()->back()->banner('Registration Successful. Please Wait for Verification.');
    }
}
