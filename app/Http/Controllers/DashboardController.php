<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $page_title = 'Admin-Dashboard';
        return view('admin.dashboard.dashboard', compact('page_title'));
    }
}
