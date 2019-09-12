<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 9/11/2019
 * Time: 12:33 PM
 */

namespace App\Http\Controllers;


use App\Client;
use App\Invoice;
use App\Models\Enums\InvoiceStatus;
use App\Subscription;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:client');
    }

    public function viewClientInvoice($invoice_id)
    {
        $invoice = Invoice::find($invoice_id)->with('client.user.userData', 'subscription.campaign')->first();
        return view('client.payments.invoice', compact('invoice'));
    }

    public function getClientInvoices()
    {
        $invoices = Invoice::where('client_id', currentClient()->id)->with('client.user.userData', 'subscription.campaign')->get();
        return $invoices;
    }

    public function createInvoice(Request $request)
    {

        $subscription = Subscription::where('id', $request->id)->first();
        // create invoice :
         $invoice = Invoice::create([
            'identifier' => $this->getInvoiceIdentifier(),
            'total' => $subscription->amount_paid,
            'discount' => 0,
            'hours' => $subscription->hours_per_week,
            'status' => InvoiceStatus::OUTSTANDING,
            'rate' => $subscription->hourly_rate,
            'notes' => 'Campaign issued after ordering a campaign',
            'service_title' => $subscription->campaign->title,
            'client_id' => currentClient()->id,
            'currency_id' => 1,
            'subscription_id' => $subscription->id,
        ]);

         // update subscription (invoice generated)
        $subscription->update([
            'invoice_generated_at' => $invoice->created_at
        ]);

         return [
             'status' => 'success',
             'invoice_id' => $invoice->id ,
         ] ;
    }

    protected function getInvoiceIdentifier()
    {

        $firstNumber = count(Client::all()) + 1;              // number of clients + 1
        $secondNumber = count(currentClient()->invoices) + 1;   // number of client invoices + 1 (already created)
        $thirdNumber = count(Invoice::all()) + 1;             // number of total invoices + 1

        return $this->getNumberZeros($firstNumber) . '-' . $this->getNumberZeros($secondNumber) . '-' . $this->getNumberZeros($thirdNumber);
    }

    protected function getNumberZeros($number)
    {
        if ($number < 10) {
            return '00' . $number;
        } elseif ($number < 100) {
            return '0' . $number;
        } else {
            return $number;
        }
    }

}