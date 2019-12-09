<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Skill;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SkillsController extends Controller
{
    public function getSkills(){
       // get current authenticated freelancer :

        if(Input::get('user_id') && currentUser()->is_admin){
            $currentUser = User::where('id',Input::get('user_id'))->first();
        }else{
            $currentUser = currentUser();
        }
        return $currentUser->skills;
    }

    public function addSkill(Request $request){
        if(Input::get('user_id') && currentUser()->is_admin){
            $currentUser = User::where('id',$request->user_id)->first();
        }else{
            $currentUser = currentUser();
        }
        $request->validate([
            'skill_title' => 'max:190',
            'type' => 'max:190',
            'icon' => 'max:190',
        ]);

        // add
        $skill = new Skill;
        $skill->user_id = $currentUser->id;
        $skill->skill_title = $request->skill_title;
        $skill->type = $request->type;
        $skill->percentage = $request->percentage;
        if(isset($request->icon)) {
            $skill->icon = $request->icon;
        }

        $skill->save();

        return ['id'=>$skill->id];

    }

    public function deleteSkill(Request $request){
        // delete education history
        $skill = Skill::where('id',$request->skillID);
        $skill->delete();
        return 'Skill deleted';
    }

    public function editSkill(Request $request){
        $skill = Skill::where('id',$request->id);

        $skill->skill_title = $request->skill_title;
        $skill->type = $request->type;
        if(isset($request->icon)) {
            $skill->icon = $request->icon;
        }
        $skill->save();
    }
}
