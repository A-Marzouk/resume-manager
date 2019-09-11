<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 9/11/2019
 * Time: 12:33 PM
 */

namespace App\Http\Controllers;


use App\Invoice;

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
}