<?php

namespace App\Http\Controllers;

use App\WorkingShift;
use Illuminate\Http\Request;

class WorkingShiftController extends Controller
{
    public function addShift(Request $request){
        return WorkingShift::create($request->toArray());
    }

    public function endShift(Request $request){
        $shift = WorkingShift::find($request->shift_id);
        $shift->update([
            'status' => 2, // completed
            'end_time' => $request->end_time,
            'total_hours' => $request->total_hours,
        ]);

        return $shift ;
    }

    public function pauseShift(Request $request){
        $shift = WorkingShift::find($request->shift_id);
        $shift->update([
            'status' => 3, // paused
            'end_time' => $request->end_time,
            'total_hours' => $request->total_hours,
        ]);
        return $shift ;
    }

    public function resumeShift(Request $request){
        $shift = WorkingShift::find($request->shift_id);
        $shift->update([
            'status' => 1, // active
            'break_time' => $request->break_time,
        ]);
        return $shift ;
    }

}
