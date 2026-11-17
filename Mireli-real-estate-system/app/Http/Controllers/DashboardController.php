<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /** /dashboard sends each person to the dashboard for their role. */
    public function index(Request $request): RedirectResponse
    {
        return redirect()->route($request->user()->dashboardRoute());
    }

    public function client(): View
    {
        return view('dashboard.client');
    }

    public function management(): View
    {
        return view('dashboard.management');
    }

    public function admin(): View
    {
        return view('dashboard.admin');
    }
}
