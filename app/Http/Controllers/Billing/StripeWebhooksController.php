<?php

namespace App\Http\Controllers\Billing;


use App\Billing\Payment;
use App\Client;
use App\Http\Controllers\Controller;
use App\Subscription;
use Carbon\Carbon;
use Stripe\Price as StripePrice;


class StripeWebhooksController extends Controller
{

    public function handle()
    {

        // calls the method according to the event payload came from Stripe.
        $payload = request()->all();
        $method = $this->eventToMethod($payload['type']);

        if (method_exists($this, $method)) {
            $this->$method($payload);
        }

        return [
            'status' => 'success'
        ];
    }

    public function eventToMethod($event)
    {
        return 'on' . studly_case(str_replace('.', '_', $event));
    }

    public function onCustomerSubscriptionDeleted($payload)
    {
        // here should be by the subscription ID.
        $stripe_subscription_id = $payload['data']['object']['id'];
        $subscription    = Subscription::where('stripe_subscription_id', $stripe_subscription_id);
        if($subscription){
            $subscription->update([
                'sub_status' => 'canceled',
                'expires_at' => Carbon::now(),
            ]);
        }
    }

    public function onChargeSucceeded($payload)
    {

        $client = Client::byStripeCustomerId($payload['data']['object']['customer']);
        // add success payment history.
        if( ! $client){
            return;
        }
        Payment::create([
            'client_id' => $client->id,
            'amount' => $payload['data']['object']['amount'] / 100,
            'payment_method' => 'stripe',
            'status' => 'paid',
            'notes' => 'Successfully paid.',
        ]);
    }

    public function onSubscriptionScheduleCreated($payload){
        $client = Client::byStripeCustomerId($payload['data']['object']['customer']);

        if( ! $client){
            return;
        }

        // get the amount of teh subscription:
        $price_id = $payload['data']['object']['phases'][0]['plans'][0]['price'];
        $price    = StripePrice::retrieve($price_id);

        Subscription::create([
            'client_id' => $client->id,
            'payment_method' => 'stripe',
            'sub_frequency' => $price['recurring']['interval'],
            'sub_status' => $payload['data']['object']['status'],
            'amount' => $price['unit_amount'] / 100 ,
            'stripe_subscription_id' => $payload['data']['object']['id'],
            'stripe_customer_id' => $payload['data']['object']['customer'],
            'expires_at' => Carbon::createFromTimestamp($payload['data']['object']['phases'][0]['end_date'])->toDateTimeString()
        ]);
    }

}