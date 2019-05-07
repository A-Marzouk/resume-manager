<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\EducationHistory;
use App\FAQ;
use Illuminate\Http\Request;

class FAQsController extends Controller
{
    public function getFAQs(){
       // get current campaign:

    }

    public function addFAQ(Request $request){

        // current campaign
        $currentCampaign = [];

        $request->validate([
            'title' => 'max:190|required',
            'question' => 'max:1500|required',
            'answer' => 'max:1500',
            'approved' => 'max:190',
        ]);

        if(isset($request->id)){
            // edit
            $FAQ = EducationHistory::where('id',$request->id)->first();
        }else{
            // add
            $FAQ = new FAQ;
            $FAQ->campaign_id = $currentCampaign->id;
        }

        $FAQ->title    = $request->title;
        $FAQ->question = $request->question;
        if(isset($request->answer)){
            $FAQ->answer   = $request->answer;
        }

        $FAQ->save();


        return ['id'=>$FAQ->id];

    }

    public function deleteFAQ(Request $request){
        // delete education history
        $FAQ = FAQ::where('id',$request->FAQ_ID);
        $FAQ->delete();
        return 'FAQ deleted';
    }

}