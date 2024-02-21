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
        return view('dashboard.home', ['listings_count' => $user_joblistings_count, 'listing_applications_count' => $user_job_listing_application_count, 'applications_count' => $user_job_applications_count]);
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
    public function settings()
    {
        return view('dashboard.settings');
    }
}
