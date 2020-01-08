<?php

namespace App\Http\Controllers;

use App\ResumeCustom;
use App\User;

use Illuminate\Http\Request;

class ResumePDFController extends Controller
{
    public function theme10($username)
    {

        $freelancer = User::where('username', $username)->with(['userData', 'skills', 'agent', 'worksHistory.projects', 'references', 'educationsHistory', 'projects' => function ($query) {
            return $query->limit(10);
        }])->where('username', $username)->first();

        if ($freelancer) {

            $view = \View::make('resume_pdf_themes.theme10', compact('freelancer'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);

            if (ob_get_contents()) ob_end_clean();
            // dd($freelancer);
            return $pdf->stream($freelancer->userData['first_name'] . ' ' . $freelancer->userData['last_name'] . '.pdf');
            // return view('freelancer.resume_pdf', compact('freelancer'));
        }
    }
}
