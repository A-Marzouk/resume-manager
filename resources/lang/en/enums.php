<?php

use App\Models\Enums\UserStage;
use App\Models\Enums\UserStatus;

return [
    'user_status' => [
        UserStatus::PENDING => 'Pending',
        UserStatus::READY_TO_SEND => 'Ready to send',
        UserStatus::SENT => 'Sent',
        UserStatus::INCOMPLETE_SURVEY => 'Incomplete survey',
        UserStatus::PARTIALLY_CREATED => 'Partially created',
    ],
    'user_stage' => [
        UserStage::PENDING => 'Pending',
        UserStage::READY_TO_SEND => 'Read to Send',
        UserStage::SENT => 'Sent',
    ],
    'yes_no' => [
        true => 'Yes',
        false => 'No',
    ],
    'gender' => [
        'f' => 'Female',
        'm' => 'Male',
    ],
];
