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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getFAQs(){
       // get current campaign:

    }

    public function addFAQ(Request $request){

        $request->validate([
            'question' => 'max:1500|required',
            'answer' => 'max:1500',
        ]);

        $faq = FAQ::create($request->toArray());

        return $faq;

    }

    public function updateFAQ(Request $request){

        $request->validate([
            'question' => 'max:1500|required',
            'answer' => 'max:1500',
        ]);


        $faq = FAQ::where('id',$request->id)->first();



        $faq->update([
            'question' => $request->question ,
            'answer' => $request->answer ,
        ]);

        return $faq ;
    }

    public function deleteFAQ(Request $request){
        // delete education history
        $FAQ = FAQ::where('id',$request->FAQ_ID);
        $FAQ->delete();
        return 'FAQ deleted';
    }

}
