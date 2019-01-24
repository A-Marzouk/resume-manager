<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Campaign;
use App\Shift;
use Illuminate\Http\Request;

class ShiftsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function addShiftToCamp(Request $request){
        $currCampaign = Campaign::where('id',$request->campaign_id)->first();
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'days' => 'max:1500|required',
        ]);

        if(isset($request->id)){
            // edit
            $shift = Shift::where('id',$request->id)->first();
        }else{
            // add
            $shift = new Shift;
            $shift->campaign_id = $currCampaign->id;
        }

        $shift->start_time = $request->start_time;
        $shift->end_time  = $request->end_time;
        if(is_array($request->days)){
            $shift->days       = implode(' | ',$request->days);
        }
        else{
            $shift->days       = $request->days ;
        }

        $shift->save();

        return ['id'=>$shift->id];

    }

    public function deleteShift(Request $request){
        $shift = Shift::where('id',$request->shiftID);
        $shift->delete();
        return 'Shift has been deleted';
    }

    public function getShiftMembers(Request $request){
        $shiftID = $request->shiftID;
        return Shift::find($shiftID)->workers;
    }

    public function addWorkersToShift(Request $request){
        $shift = Shift::find($request->shiftID) ;
        if(empty($request->users)){
            // remove all freelancers from the shift.
            foreach ($shift->workers as $worker){
                $shift->workers()->detach($worker->id);
            }
        }else{
            foreach ($request->users as $user){
                // sync with the id's sent.
                $IDs[] = $user['id'];
            }
            $shift->workers()->sync($IDs);
        }
        return 'Workers Updated';
    }

}