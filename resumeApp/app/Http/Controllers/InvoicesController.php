<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Booking;
use App\Client;
use App\Invoice;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('viewInvoicePublicPage','invoiceToPDF');
    }

    public function viewInvoicePublicPage($unique_number){
        $invoice = Invoice::where('unique_number',$unique_number)->first();
        return view('pay_invoice',compact('invoice'));
    }


    public function viewInvoicesPage($client_id){
        $client = Client::where('id',$client_id)->first();
        return view('admin.client_invoices',compact('client'));
    }

    public function getInvoices($client_id){
       // get current authenticated freelancer :
        $client = Client::where('id',$client_id)->first();
        $invoices = $client->invoices;
        foreach ($invoices as &$invoice){
            $invoice['clientName'] = $client->name;
            $invoice['agent'] = $invoice->user;
            $services = $invoice->services;
            $invoice['services'] = $services;
        }
        return $invoices;
    }

    public function getInvoiceUniqueNumberByID($id){
        return Invoice::where('id',$id)->first()->unique_number ;
    }

    protected function invoiceValidator(array $data)
    {
        return Validator::make($data, [
            'total_amount' => 'max:10|required',
            'currency' => 'max:191',
            'hours' => 'max:10',
            'rate' => 'max:191',
            'status' => 'max:191',
            'notes' => 'max:1500',
            'payment_options' => 'max:191',
        ]);
    }

    public function addInvoice(Request $request){
        $validator = $this->invoiceValidator($request->all());
        if ($validator->fails())
        {
            return ['hasErrors' => $validator->errors()];
        }

        $currentClient = Client::where('id',$request->client_id)->first();

        if(isset($request->id)){
            // edit
            $invoice = Invoice::where('id',$request->id)->first();
        }else{
            // add new invoice
            $invoice = new Invoice;
            $invoice->client_id = $currentClient->id;
            $invoice->timeZone  = $currentClient->timeZone;
        }

        $invoice->total_amount = $request->total_amount;
//        $invoice->user_id = $request->user_id;
        $invoice->campaign_brief_id = $request->campaign_brief_id;

        if(isset($request->payment_options)){
            $invoice->payment_options      = implode(',',$request->payment_options);
        }

        $invoice->currency      = $request->currency;
        $invoice->hours        = $request->hours;

        if(isset($request->timeZone)){
            $invoice->timeZone        = $request->timeZone;
        }
        if(isset($request->week)){
            $invoice->week        = $request->week;
        }
        if(isset($request->weekDate)){
            $invoice->weekDate        = $request->weekDate;
        }
        if(isset($request->start_time)){
            $invoice->start_time        = $request->start_time;
        }

        if(isset($request->end_time)){
            $invoice->end_time        = $request->end_time;
        }

        if(isset($request->service)){
            $invoice->service        = $request->service;
        }

        if(isset($request->time_of_service)){
            $invoice->time_of_service        = $request->time_of_service;
        }


        $invoice->status       = $request->status;
        if(isset($request->notes)){
            $invoice->notes = $request->notes;
        }


        $invoice->save();

        if(!isset($request->id)){ // only in new invoices automate unique numbers
            $firstNumber  = count(Client::all()) + 1 ; // number of clients + 1
            $secondNumber = count($invoice->client->invoices); // number of client invoices + 1 (already created)
            $thirdNumber  = count(Invoice::all()) ; // number of total invoices + 1

            $invoice->unique_number = $this->getNumberZeros($firstNumber). '-' . $this->getNumberZeros($secondNumber)
                . '-' . $this->getNumberZeros($thirdNumber);
        }

        if(!isset($request->id)) { // only in new invoices
            $invoice->booking_id = $this->createTemporaryBooking($invoice);
        }

        if($invoice->status === 'Paid' && isset($invoice->booking_id)){
            // change booking to status to be paid.
            $booking = Booking::where('id',$invoice->booking_id)->first();
            $booking->is_paid = true;
            $booking->save();
        }

        $invoice->save();
        return ['id'=> $invoice->id , 'unique_number'=>$invoice->unique_number];
    }

    protected function getNumberZeros($number){
        if($number < 10){
            return '00' . $number;
        }elseif ($number < 100){
            return '0' . $number;
        }else{
            return $number;
        }
    }

    public function duplicateInvoice($invoice_id){
        // Retrieve the first task
        $invoice = Invoice::where('id',$invoice_id)->first();

        $newInvoice   = $invoice->replicate();

        $firstNumber  = count(Client::all()) + 1 ; // number of clients + 1
        $secondNumber = count($invoice->client->invoices); // number of client invoices + 1 (already created)
        $thirdNumber  = count(Invoice::all()) ; // number of total invoices + 1

        $newInvoice->unique_number = $this->getNumberZeros($firstNumber). '-' . $this->getNumberZeros($secondNumber)
            . '-' . $this->getNumberZeros($thirdNumber);
        $newInvoice->status = 'Unpaid';

        $newInvoice->save();

        return $newInvoice;
    }

    public function deleteInvoice(Request $request){
        // delete invoice
        $invoice = Invoice::where('id',$request->invoiceID);
        $invoice->delete();
        return 'Invoice deleted';
    }

    public function updateInvoiceNumber(Request $request){
        $invoiceID = $request->invoice_id;
        $newNumber = $request->newNumber ;
        if(Invoice::where('unique_number',$newNumber)->first()){
            return 'used';
        }
        else{
            $invoice = Invoice::where('id',$invoiceID)->first();
            $invoice->unique_number = $newNumber;
            $invoice->save();
            return 'Updated';
        }
    }

    public function invoiceToPDF($unique_number){
        $invoice = Invoice::where('unique_number',$unique_number)->first();
        $pdf = App::make('dompdf.wrapper');
        $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf->loadView('invoice_to_pdf', compact('invoice'));
        return $pdf->stream();

    }

    protected function createTemporaryBooking($invoice){
        $booking = new Booking;

        $booking->client_id = $invoice->client_id;
        $booking->user_id = $invoice->user_id;
        $booking->invoice_id = $invoice->id;
        $booking->hours = $invoice->hours;
        $booking->amount_paid = $invoice->total_amount;
        $booking->payment_method = 'PayPal';
        $booking->is_paid = false;

        $booking->save();

        return $booking->id;
    }
}