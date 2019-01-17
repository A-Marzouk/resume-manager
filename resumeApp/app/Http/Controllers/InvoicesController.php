<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Client;
use App\Invoice;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function viewInvoicesPage($client_id){
        $client = Client::where('id',$client_id)->first();
        return view('admin.client_invoices',compact('client'));
    }

    public function getInvoices($client_id){
       // get current authenticated freelancer :
        $client = Client::where('id',$client_id)->first();
        return $client->invoices;
    }

    public function addInvoice(Request $request){
        $currentClient = Client::where('id',$request->client_id)->first();
        $request->validate([
            'total_amount' => 'max:10|required',
            'service' => 'max:1500|required',
            'hours' => 'max:10|required',
            'rate' => 'max:10|required',
            'status' => 'max:191|required',
            'time_of_service' => 'max:1500',
            'notes' => 'max:1500',
        ]);


        if(isset($request->id)){
            // edit
            $invoice = Invoice::where('id',$request->id)->first();
        }else{
            // add
            $invoice = new Invoice;
            $invoice->client_id = $currentClient->id;
        }

        $invoice->total_amount = $request->total_amount;
        $invoice->service      = $request->service;
        $invoice->hours        = $request->hours;
        $invoice->rate         = $request->rate;
        $invoice->status       = $request->status;
        if(isset($request->notes)){
            $invoice->notes = $request->notes;
        }
        if(isset($request->time_of_service)){
            $invoice->time_of_service = $request->time_of_service;
        }

        $invoice->save();

        return ['id'=> $invoice->id];

    }

    public function deleteInvoice(Request $request){
        // delete invoice
        $invoice = Invoice::where('id',$request->invoiceID);
        $invoice->delete();
        return 'Invoice deleted';
    }
    
}