<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 8/21/2019
 * Time: 3:15 PM
 */

namespace App\Models\Enums;


class LogStatus
{
    const ER = 1 ;  // email request
    const CB = 2 ;  // call back
    const NI = 3 ;  // Not interested
    const AS = 4 ;  // appointment set
    const CR = 5 ;  // decision maker contacts received
    const S  = 6 ;  // successful

}