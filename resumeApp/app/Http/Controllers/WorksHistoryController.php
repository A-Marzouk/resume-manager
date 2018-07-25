<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\WorkHistory;

class WorksHistoryController extends Controller
{
    public function showHistory(){ // function for testing to open the page of works history
        return view('includes.work_overview');
    }

    public function getWorks(){
       // get current authenticated freelancer :
        $currentUser = auth()->user();
        return $currentUser->worksHistory;
    }
}