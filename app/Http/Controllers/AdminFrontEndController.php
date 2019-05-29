<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 5/20/2019
 * Time: 11:35 AM
 */

namespace App\Http\Controllers;


class AdminFrontEndController extends Controller
{
    public function showDashboard(){
        return view('admin.dashboard.dashboard');
    }

    public function showApplicantProfile(){
        return view('admin.dashboard.applicant_profile');
    }
}