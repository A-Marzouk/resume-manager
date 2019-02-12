<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Campaign;
use App\Invoice;
use App\Shift;
use App\ShiftDay;
use App\User;
use Illuminate\Http\Request;

class ShiftsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function addShiftToCamp(Request $request){
        if(isset($request->campaign_id)){
            $currCampaign = Campaign::where('id',$request->campaign_id)->first();
        }
        if(isset($request->invoiceID)){
            $currInvoice  = Invoice::where('id',$request->invoiceID)->first();
        }
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'days' => 'max:1500|required',
            'rate' => 'max:191',
            'service' => 'max:191',
        ]);

        if(isset($request->id)){
            // edit
            $shift = Shift::where('id',$request->id)->first();
        }else{
            // add
            $shift = new Shift;
            if(isset($currInvoice)){
                $shift->invoice_id = $currInvoice->id;
            }
            if(isset($currCampaign)){
                $shift->campaign_id = $currCampaign->id;
            }
        }

        $shift->start_time = $request->start_time;
        $shift->end_time  = $request->end_time;
        if(isset($request->rate)){
            $shift->rate  = $request->rate;
        }
        if(isset($request->service)){
            $shift->service  = $request->service;
        }
        if(isset($request->days)){
            $shift->days      = implode('|',$request->days);
        }

        $shift->save();

        // update shift days records :
        $currentDays = $shift->daysAsRecords;
        $existingDates = [] ;
        // remove current days to update :
        if(count($currentDays) > 0){
            foreach ($currentDays as $day){
                $existingDates[] = $day->date;
            }
        }

        foreach ($request->days as $dayDate){ // $request->days is the last needed result.
            $day = new ShiftDay;
            $day->shift_id = $shift->id;
            $day->date= $dayDate;
            if(!in_array($dayDate,$existingDates)){
                $day->save();
            }
        }

        // in case I deleted a day. so now it exists in existing dates but no in request->days. so delete the record.
        foreach ($existingDates as $existDayDate){
            if(!in_array($existDayDate, $request->days)){
                // delete the record
                $toBeDeletedShiftDay = ShiftDay::where('date',$existDayDate)->first();
                // deattach all users.
                $toBeDeletedShiftDay->users()->detach();
                $toBeDeletedShiftDay->delete();
            }
        }

        return ['id'=>$shift->id];

    }

    public function deleteShift(Request $request){
        $shift = Shift::where('id',$request->shiftID)->first();
        // update shift days records :
        $currentDays = $shift->daysAsRecords;
        // remove current days to update :
        if(count($currentDays) > 0){
            foreach ($currentDays as $day){
                $record = ShiftDay::where('id',$day->id)->first();
                $record->users()->detach();
                $record->delete();
            }
        }
        $shift->delete();
        return 'Shift has been deleted';
    }

    public function addUserToShiftDay(Request $request){
        $day = ShiftDay::find($request->dayID);
        if(!$day->users->contains($request->selectedUser)){
            $day->users()->attach($request->selectedUser);
            return User::where('id',$request->selectedUser)->first();
        }
        return 'user_exists';
    }

    public function removeUserFromShiftDay(Request $request){
        $day = ShiftDay::find($request->dayID);
        $day->users()->detach($request->selectedUser);
        return 'Users Updated';
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