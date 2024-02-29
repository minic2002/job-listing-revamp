<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\JobListing;
use Carbon\Carbon;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LandingController extends Controller
{
    public function home()
    {
        $listings = JobListing::all();
        return view('landing', ['listings' => $listings]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function about(){
        return view('about');
    }

    public function store_message(Request $request)
    {
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contact::create($formfields);
        return Redirect::back()->with('success', 'Thank you for reaching out! We\'ve received your message and will respond soon.');
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
