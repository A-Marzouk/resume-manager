<?php

use App\Models\Enums\UserStage;
use App\Models\Enums\UserStatus;

return [
    'user_status' => [
        UserStatus::NEW_APPLICANT => 'New applicant',
        UserStatus::VOICE_PROCESS => 'In voice application process',
        UserStatus::DATA_PROCESS => 'in data application process',
        UserStatus::VOICE_APPROVED_AVAILABLE => 'Voice approved, Available for work',
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
