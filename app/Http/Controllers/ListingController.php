<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function show(Request $request)
    {
        $listing = JobListing::find($request->listing);
        return view('listing.show-listing', ['listing' => $listing]);
    }

    // public function job_form()
    // {
    //     return view('listing.apply-job');
    // }
}
