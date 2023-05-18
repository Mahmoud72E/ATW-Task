<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show Dashboard For All Links
     */
    public function index()
    {
        return view('dashboard');
    }
}
