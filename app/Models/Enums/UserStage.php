<?php

namespace App\Models\Enums;

class UserStage
{
    const PENDING = 1; // v0.0
    const READY_TO_SEND = 2; // v0.5
    const SENT = 3; // NOT-SELECTED

    const CSS_CLASS_NAMES = [
        CalendarEventStatus::PENDING => 'm-fc-event--light m-fc-event--solid-pending',
        CalendarEventStatus::READY_TO_SEND => 'm-fc-event--light m-fc-event--solid-ready-to-send',
        CalendarEventStatus::SENT => 'm-fc-event--light m-fc-event--solid-sent',
    ];
}
