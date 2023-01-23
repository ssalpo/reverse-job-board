<?php

namespace App\Http\Controllers;

use App\Models\DeveloperProfile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $developers = DeveloperProfile::whereSearchStatus(DeveloperProfile::SEARCH_STATUS_OPEN)
            ->orderBy('created_at', 'DESC')
            ->take(10)
            ->get();

        return inertia('Home', compact('developers'));
    }

    public function chooseProfile()
    {
        return inertia('Profile/Choose');
    }

    public function hire()
    {
        return inertia('Hire');
    }
}
