<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 9/10/2018
 * Time: 11:47 AM
 */

namespace App\Http\Controllers;


use App\Booking;

class BookingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function viewBookingsCalendar(){
        $bookings = Booking::all();
        return view('admin.bookings_calendar',compact('bookings'));
    }

}