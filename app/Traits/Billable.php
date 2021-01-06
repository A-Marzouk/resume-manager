<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 9/22/2020
 * Time: 10:54 AM
 */

namespace App\Traits;


use App\Subscription;
use App\Billing\paymentGatewayInfo;

trait Billable
{

    public static function byStripeCustomerId($id){
        $subscription = Subscription::where('stripe_customer_id', $id)->first();
        if($subscription){
            return $subscription->client;
        }

        $paymentGatewoayInfo = paymentGatewayInfo::where('stripe_customer_id', $id)->first();
        if($paymentGatewoayInfo){
            return $paymentGatewoayInfo->client;
        }
    }

}