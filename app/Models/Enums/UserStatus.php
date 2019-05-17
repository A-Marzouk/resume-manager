<?php

namespace App\Models\Enums;

class UserStatus
{
    const PENDING = 1; // blue
    const READY_TO_SEND = 2; // lightgreen
    const SENT = 3; // red
    const INCOMPLETE_SURVEY = 4; // grey
    const PARTIALLY_CREATED = 5; // orange

    const CSS_CLASS_NAMES = [
        CalendarEventStatus::PENDING => 'm-fc-event--light m-fc-event--solid-pending',
        CalendarEventStatus::READY_TO_SEND => 'm-fc-event--light m-fc-event--solid-ready-to-send',
        CalendarEventStatus::SENT => 'm-fc-event--light m-fc-event--solid-sent',
        CalendarEventStatus::INCOMPLETE_SURVEY => 'm-fc-event--light m-fc-event--solid-incomplete-survey',
        CalendarEventStatus::PARTIALLY_CREATED => 'm-fc-event--light m-fc-event--solid-partially-created',
    ];
}
