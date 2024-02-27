<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        $resumes = $user->user_resume()->get();
        $listing = JobListing::find($request->listing);
        $educations = ['none', 'elem', 'jhs', 'shs', 'bachelor', 'masters', 'doctorate'];
        return view('listing.show-listing', ['listing' => $listing, 'resumes' => $resumes, 'educations' => $educations]);
    }

    public function job_apply(Request $request)
    {
        $user = $request->user();
        $formFields = $request->validate([
            'job_listing_id' => 'required',
            'resume_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'tel' => ['required', 'min:3'],
            'education' => 'required'
        ]);


        $job_application = $user->job_application()->firstOrNew($formFields);

        if (!$job_application->exists()) {
            $job_application->save();
            return redirect(route('dashboard.job-applications'))->with('success', 'Application form submitted');
        } else {
            return redirect(route('dashboard.job-applications'))->with('error', 'You already submitted an application form on this company');
        }

    }
}
