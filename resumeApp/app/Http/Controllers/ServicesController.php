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
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function viewServicesPage($client_id){
        $client = Client::where('id',$client_id)->first();
        return view('admin.client_services',compact('client'));
    }

    public function getServices($client_id){
       // get current authenticated freelancer :
        $client = Client::where('id',$client_id)->first();
        $services = $client->services;
        foreach ($services as &$service){
            $service['agent'] = $service->user;
        }
        return $services;
    }

    protected function serviceValidator(array $data)
    {
        return Validator::make($data, [
            'title' => 'max:1500|required',
            'total_price' => 'max:10|required',
            'timeZone' => 'max:191',
            'week' => 'max:191',
            'days' => 'max:191',
            'weekDate' => 'max:191',
            'hours' => 'max:10|required',
            'rate' => 'max:191|required',
        ]);
    }

    public function addService(Request $request){
        $validator = $this->serviceValidator($request->all());
        if ($validator->fails())
        {
            return ['hasErrors' => $validator->errors()];
        }

        $currentClient = Client::where('id',$request->client_id)->first();

        if(isset($request->id)){
            // edit
            $service = Service::where('id',$request->id)->first();
        }else{
            // add new service
            $service = new Service;
            $service->client_id = $currentClient->id;
            $service->timeZone  = $currentClient->timeZone;
        }
        if(isset($request->user_id)){
            $service->user_id        = $request->user_id;
        }

        $service->title = $request->title;
        $service->total_price = $request->total_price;
        $service->week      = $request->week;
        $service->weekDate      = $request->weekDate;

        if(isset($request->days)){
            if(in_array('all_days',$request->days)){
                $service->days   = 'all_days';
            }else{
                $service->days      = implode(',',$request->days);
            }
        }

        $service->hours        = $request->hours;
        if(isset($request->timeZone)){
            $service->timeZone        = $request->timeZone;
        }
        $service->rate         = $request->rate;

        $service->save();
        return ['id'=> $service->id];
    }

    public function deleteService(Request $request){
        // delete service
        $service = Service::where('id',$request->serviceID);
        $service->delete();
        return 'Service deleted';
    }

    public function generateInvoiceForServices(Request $request){
        $services = $request->selectedServices ;
        $total_amount = 0 ;
        $total_hours  = 0 ;
        foreach ($services as $service){
            $total_amount += $service['total_price'];
            $total_hours  += $service['hours'];
        }

        $invoice = new Invoice;
        $invoice->total_amount = $total_amount;
        $invoice->hours = $total_hours;
        $invoice->currency = 'USD';
        $invoice->status = 'Unpaid';
        $invoice->client_id = $services[0]['client_id'];
        $invoice->save();


        $clientName = $invoice->client->name;
        $words = explode(" ", $clientName);
        $firstLetters = "";
        foreach ($words as $w) {
            $firstLetters .= $w[0];
        }
        if(!isset($request->id)){ // only in new invoices automate unique numbers
            $firstNumber  = count(Client::all()) + 1 ; // number of clients + 1
            $secondNumber = count($invoice->client->invoices); // number of client invoices + 1 (already created)
            $thirdNumber  = count(Invoice::all()) ; // number of total invoices + 1

            $invoice->unique_number = $this->getNumberZeros($firstNumber). '-' . $this->getNumberZeros($secondNumber)
                . '-' . $this->getNumberZeros($thirdNumber);
        }

        $invoice->save();

        foreach ($services as $service){
            $invoiceService = Service::where('id',$service['id'])->first();
            $invoiceService->invoice_id = $invoice->id;
            $invoiceService->save();
        }

        return $invoice->id;

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

}