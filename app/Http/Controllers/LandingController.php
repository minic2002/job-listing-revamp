<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Carbon\Carbon;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LandingController extends Controller
{
    public function home(Request $request)
    {
        $listings = JobListing::all();
        return view('landing', ['listings' => $listings]);
    }

    public function store_email(Request $request)
    {
        $formfields = $request->validate([
            'email' => ['required', 'email']
        ]);

        $formfields['subscribe_date'] = Carbon::now();

        Newsletter::create($formfields);
        return Redirect::back()->with('success', 'Thank You for Subscribing!');
    }
}
