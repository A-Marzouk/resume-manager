<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Agent;
use App\Recording;
use App\Skill;
use Illuminate\Http\Request;

class AgentsController extends Controller
{
    public function viewAgents(){
        $agents = $this->getAgents();
        return view('agents',compact('agents'));
    }

    public function getAgents(){
       // get current authenticated freelancer :
        return Agent::all();
    }

    public function addAgent(Request $request){
        $request->validate([
            'number' => 'max:10|required',
            'name' => 'max:191|required',
            'language' => 'max:191|required',
            'hourly_rate' => 'max:10|required',
            'available_hours' => 'max:1500|required',
            'location' => 'max:191|required',
            'experience'  => 'max:1500|required'
        ]);

        if(isset($request->id)){
            // edit
            $agent = Agent::where('id',$request->id)->first();
        }else{
            // add
            $agent = new Agent;
        }

        $agent->name = $request->name;
        $agent->number = $request->number;
        $agent->experience = $request->experience;
        $agent->language = $request->language;
        $agent->hourly_rate = $request->hourly_rate;
        $agent->available_hours = $request->available_hours;
        $agent->location = $request->location;
        $agent->save();

        return ['id'=>$agent->id];

    }

    public function addRecordToAgent(Request $request){
        $record = new Recording;
        $record->title = $request->title;
        if($request->src){
            $record->src = $request->src;
        }
        elseif($request->audioFile) {
            $pathToAudio = Upload::audio($request->audioFile, 'audioFile', '_159'.$currentUser->id.'Record_');
            if ($pathToAudio) {
                $record->src = '/'.$pathToAudio;
            }
        }

        $record->save();
    }

    public function deleteAgent(Request $request){
        // delete education history
        $agent = Agent::where('id',$request->agentID);
        $agent->delete();
        return 'Agent deleted';
    }

    public function getAgentRecords($agent_id){
        $agent = Agent::where('id',$agent_id)->first();
        return $agent->records;
    }

}