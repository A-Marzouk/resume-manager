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
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use ZipArchive;

class InvoicesController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:client');
    }

    public function viewClientInvoice($invoice_id)
    {
        $invoice = Invoice::where('id', $invoice_id)->with('client.user.userData', 'subscription.campaign')->first();
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
        $invoice = $this->createNewInvoice($subscription);

        return [
            'status' => 'success',
            'invoice_id' => $invoice->id,
        ];

    }

    protected function createNewInvoice($subscription)
    {
        $invoice = Invoice::create([
            'identifier' => $this->getInvoiceIdentifier(),
            'total' => $subscription->amount_paid,
            'discount' => 0,
            'hours' => $subscription->hours_per_week,
            'status' => InvoiceStatus::OUTSTANDING,
            'billing_date' => Date('Y.m.d'),
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

        return $invoice;
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

    public function exportInvoice($invoice_id)
    {
//        $zip_file = 'invoices.zip'; // Name of our archive to download
//
//        // Initializing PHP class
//        $zip = new ZipArchive();
//        $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);
//
//        $invoice_file = 'invoices/aaa001.pdf';
//
//        // Adding file: second parameter is what will the path inside of the archive
//        // So it will create another folder called "storage/" inside ZIP, and put the file there.
//        $zip->addFile(storage_path($invoice_file), $invoice_file);
//        $zip->close();
//
//        // We return the file immediately after download
//        return response()->download($zip_file);

        $invoice = Invoice::where('id', $invoice_id)->with('client.user.userData', 'subscription.campaign')->first();
        $pdf = App::make('dompdf.wrapper');
        $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif','javascript-delay' => 3000]);
        $pdf->loadView('client.payments.invoice_pdf_view', compact('invoice'));
        return $pdf->stream();

    }

    public function downloadAllInvoices(){

        $client   = currentClient();
        $invoices = Invoice::where('client_id', $client->id)->with('client.user.userData', 'subscription.campaign')->get();

        foreach ($invoices as $invoice){
            // 1- make the pdf file
            $pdf = App::make('dompdf.wrapper');
            $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif','javascript-delay' => 3000]);
            $pdf->loadView('client.payments.invoice_pdf_view', compact('invoice'));

            // save the output to folder

            $output = $pdf->output();
            if (!is_dir(storage_path().'/invoices/'.$invoice->client->id)) {
                // dir doesn't exist, make it
                mkdir(storage_path().'/invoices/'.$invoice->client->id);
            }
            file_put_contents(storage_path().'/invoices/'.$invoice->client->id.'/invoice_'. $invoice->id .'.pdf', $output);


            $files = glob(storage_path('/invoices/'.$invoice->client->id));
            Zipper::make(public_path('invoices.zip'))->add($files)->close();
            return response()->download(public_path('invoices.zip'));

        }


    }

}
