<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        switch (true) {
            case currentUser()->is_admin:
                return redirect()->route('admin.dashboard');
            case currentUser()->is_agent:
                return redirect()->route('freelancer.dashboard');
            case currentUser()->is_client:
                return redirect()->route('welcome');
        }
    }
}
