<?php

namespace App\Http\Controllers;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Http\Request;


class MollieController extends Controller
{   

    // public function  __construct() {
    //     Mollie::api()->setApiKey('test_FbVACj7UbsdkHtAUWnCnmSNGFWMuuA'); // your mollie test api key
    // }

    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function preparePayment()
    {   
        

        $payment = Mollie::api()->payments()->create([
        'amount' => [
            'currency' => 'EUR', // Type of currency you want to send
            'value' => '10.00', // You must send the correct number of decimals, thus we enforce the use of strings
        ],
        'description' => 'Payment By codehunger', 
        'redirectUrl' => route('molliesucces'),
        "webhookUrl" => 'http://3e8d-85-147-241-163.ngrok.io/webhookmollie',
        // after the payment completion where you to redirect
        ]);
    
        $payment = Mollie::api()->payments()->get($payment->id);
    
        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * Page redirection after the successfull payment
     *
     * @return Response
     */
    public function paymentSuccess() {
        echo 'payment has been received';

    }

    public function test(Request $request){
        error_log("volgen smij werkt het nu");
    }


    public function handleWebhookNotification(Request $request) {
        $paymentId = $request->input('id');
        $payment = Mollie::api()->payments->get($paymentId);
    
        if ($payment->isPaid())
        {

            error_log('Payment received.');
            error_log("PAYMENT DESCRIPTION  ".$request->input('id'));
            // echo 'Payment received.';
            // echo 
        }
    }
}