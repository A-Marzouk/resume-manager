<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Client;
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

}