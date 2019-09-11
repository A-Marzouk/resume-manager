<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 8/21/2019
 * Time: 3:15 PM
 */

namespace App\Models\Enums;


class InvoiceStatus
{
    const PAID = 1 ;  // email request
    const OUTSTANDING = 2 ;  // call back
    const CANCELLED = 3 ;  // Not interested


}