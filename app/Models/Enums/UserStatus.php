<?php

namespace App\Models\Enums;

class UserStatus
{

    const NEW_APPLICANT = 1 ;               //        Grey( new applicant , default status, shaded box )
    const VOICE_PROCESS = 2 ;               //        orange. ( in voice application process)
    const DATA_PROCESS = 3 ;                //        yellow  ( in data application process )
    const VOICE_APPROVED_AVAILABLE = 4 ;    //        light green ( voice approved, available for work  )
    const DATA_APPROVED_AVAILABLE = 5 ;     //        light blue( data approved , available for work )
    const VOICE_APPROVED_NOT_AVAILABLE = 6; //        dark green ( voice approved and fully booked/ unavailable  )
    const DATA_APPROVED_NOT_AVAILABLE = 7 ; //        dark blue( data approved , full booked / unavailable )
    const DATA_NOT_APPROVED = 8 ;           //        light red ( unapproved for data)
    const VOICE_NOT_APPROVED = 9 ;          //        red (unapproved for Voice)




    const CSS_CLASS_NAMES = [
        CalendarEventStatus::PENDING => 'm-fc-event--light m-fc-event--solid-pending',
        CalendarEventStatus::READY_TO_SEND => 'm-fc-event--light m-fc-event--solid-ready-to-send',
        CalendarEventStatus::SENT => 'm-fc-event--light m-fc-event--solid-sent',
        CalendarEventStatus::INCOMPLETE_SURVEY => 'm-fc-event--light m-fc-event--solid-incomplete-survey',
        CalendarEventStatus::PARTIALLY_CREATED => 'm-fc-event--light m-fc-event--solid-partially-created',
    ];
}
