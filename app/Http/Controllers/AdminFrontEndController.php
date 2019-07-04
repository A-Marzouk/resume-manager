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
        return view('admin-new.dashboard.dashboard');
    }

    public function showApplicantProfile(){
        return view('admin-new.dashboard.applicant_profile');
    }

    public function showApprovedAgentProfile(){
        return view('admin-new.dashboard.approved_agent_profile');
    }

    public function showAdvancedSearchPage(){
        return view('admin-new.advanced_search_view');
    }

    public function showRegisterAgentPage(){
        return view('admin-new.register_agent_view');
    }

    public function addBehanceDesigner(){
        return view('admin-new.add_behance_designer');
    }

}