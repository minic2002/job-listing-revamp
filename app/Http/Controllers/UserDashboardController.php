<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        return redirect(route('dashboard.home'));
    }
    public function home(Request $request)
    {
        $user = $request->user();

        //Job Listings Count
        $user_joblistings_count = $user->job_listing()->count();

        //Job Listing Applications Count
        $user_job_listings = $user->job_listing();
        $user_job_listing_application_count = 0;

        foreach ($user_job_listings as $user_job_listing) {
            $user_job_listing_application_count += $user_job_listing->job_application()->count();
        }

        //Job Applications Count
        $user_job_applications_count = $user->job_application()->count();

        //Company
        $user_companies = $user->company()->latest()->limit(5);
        // dd($user_companies->count());
        return view('dashboard.home', ['listings_count' => $user_joblistings_count, 'listing_applications_count' => $user_job_listing_application_count, 'applications_count' => $user_job_applications_count, 'companies' => $user_companies]);
    }
    public function company()
    {
        return view('dashboard.company');
    }
    public function listings()
    {
        return view('dashboard.listings');
    }
    public function applications()
    {
        return view('dashboard.applications');
    }
    public function settings(Request $request)
    {
        $user = $request->user(); //this will return authenticated user data

        $user_detail = $user->user_detail()->first();
        return view('dashboard.settings', ['user' => $user_detail]);
    }

    public function update_settings(Request $request)
    {
        //if you pass middleware('auth') on route you can access user data in request
        $user = $request->user(); //this will return authenticated user data

        //example
        $formFields = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'age' => ['required'],
            'gender' => ['required'],
            'address' => ['required', 'min:3'],
            'tel' => ['required', 'min:3'],
        ]);

        // Check if the user already has a user detail record
        if ($user->user_detail) {
            // If user detail exists, update it
            $user->user_detail->update($formFields);

            return redirect(route('dashboard.settings'))->with('success', 'User Details updated successfully');
        } else {
            // If user detail does not exist, create a new one
            $user->user_detail()->create($formFields);
            return redirect(route('dashboard.settings'))->with('success', 'User Details created successfully');
        }

    }
}
