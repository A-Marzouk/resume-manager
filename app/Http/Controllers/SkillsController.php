<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function getSkills(){
       // get current authenticated freelancer :
        $currentUser = auth()->user();
        return $currentUser->skills;
    }

    public function addSkill(Request $request){
        $currentUser = currentUser();
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
