<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $user_companies = $user->company()->latest()->limit(5)->get();
        // dd($user_companies->count());
        return view('dashboard.home', ['listings_count' => $user_joblistings_count, 'listing_applications_count' => $user_job_listing_application_count, 'applications_count' => $user_job_applications_count, 'companies' => $user_companies]);
    }
    public function company(Request $request)
    {
        $user = $request->user();
        $companies = $user->company()->latest()->get();
        return view('dashboard.company', ['companies' => $companies]);
    }
    public function company_create()
    {
        return view('dashboard.company-create');
    }
    public function store_company(Request $request)
    {
        $user = $request->user();

        $formFields = $request->validate([
            'name' => ['required', Rule::unique('companies', 'name')],
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal' => 'required',
            'tel' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'website' => 'required',
        ]);

        if ($request->hasFile('logo_url')) {
            $formFields['logo_url'] = $request->file('logo_url')->store('logos', 'public');
        }
        $user->company()->create($formFields);
        return redirect(route('dashboard.company'))->with('success', 'Company Created Successfully');
    }

    public function listings(Request $request)
    {
        $user = $request->user();
        $listings = $user->job_listing()->latest()->get();
        return view('dashboard.listings', ['listings' => $listings]);
    }

    public function listings_post()
    {
        $companies = Company::all();
        $categories = JobCategory::all();
        if ($companies->count() != 0) {
            return view('dashboard.job-post', ['companies' => $companies, 'categories' => $categories]);
        } else {
            return redirect(route('dashboard.job-listings'))->with('error', 'Posting a job requires atleast one company');
        }

    }

    public function store_job_post(Request $request)
    {
        $user = $request->user();
        $formfields = $request->validate([
            'company_id' => 'required',
            'employment_type' => 'required',
            'min_monthly_salary' => 'required',
            'max_monthly_salary' => 'required',
            'job_title' => 'required',
            'job_category_id' => 'required',
            'description' => 'required',
        ]);

        $user->job_listing()->create($formfields);
        return redirect(route('dashboard.job-listings'))->with('success', 'Listing added successfully');

    }

    public function applications(Request $request)
    {
        $user = $request->user();
        $applications = $user->job_application()->latest()->get();
        $headers = ['Name', 'Job Title', 'Salary Range', 'Resume', 'Date Applied'];
        return view('dashboard.applications', ['applications' => $applications, 'headers' => $headers]);
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

    public function resume(Request $request)
    {
        $user = $request->user();
        $resumes = $user->user_resume()->latest()->get();
        return view('dashboard.resume', ['resumes' => $resumes]);
    }

    public function post_resume()
    {
        return view('dashboard.post-resume');
    }

    public function store_resume(Request $request)
    {
        $user = $request->user();
        $formfields = $request->validate([
            'name' => 'required',
            'resume_url' => 'required|mimes:pdf,xlsx,xls,csv',
        ]);

        $formfields['resume_url'] = $request->file('resume_url')->store('resumes', 'public');
        $user->user_resume()->create($formfields);
        return redirect(route('dashboard.my-resume'))->with('success', 'Resume created successfully');
    }
}
