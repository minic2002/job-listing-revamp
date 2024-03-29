<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\UserResume;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Notifications\JobListingApplicationNotification;

class ListingController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        if ($user != null) {
            $resumes = $user->user_resume()->latest()->get();
        } else {
            $resumes = UserResume::all();
        }
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

        $existing_job_application = $user->job_application()->where('job_listing_id', $formFields['job_listing_id'])->first();
        if (!$existing_job_application) {
            $job_application = $user->job_application()->create($formFields);
            $job_listing_owner = $job_application->job_listing->user;

            $notification = new JobListingApplicationNotification($user->email, $job_application->job_listing);
            $job_listing_owner->notify($notification);
            Notification::create([
                'user_id' => $job_listing_owner->id,
                'application_id' => $job_application->id,
                'message' => $job_application->first_name . " " . $job_application->last_name . ' has sent an application to your job listing ' . $job_application->job_listing->job_title,
            ]);
            return redirect(route('dashboard.job-applications'))->with('success', 'Application form submitted');
        } else {
            return redirect(route('dashboard.job-applications'))->with('error', 'You already submitted an application form on this company');
        }

    }
}
