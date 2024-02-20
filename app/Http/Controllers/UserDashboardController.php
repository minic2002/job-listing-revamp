<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        return redirect(route('dashboard.home'));
    }
    public function home()
    {
        return view('dashboard.home');
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
