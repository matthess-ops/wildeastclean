<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Error;
use Mollie\Laravel\Facades\Mollie;

use Illuminate\Support\Facades\Mail;
use \App\Mail\OrderBevestiging;
use Symfony\Component\HttpFoundation\Session\Session;


class OrderController extends Controller
{




    //delte na testing
    public function orderForm()
    {


        return view('orders.orderform');
    }

        //delte na testing
    // public function index()
    // {
    //     $orders = Order::all()->paginate(15);;
    //     return view('orders.index',['orders'=>$orders]);
    // }




    // calculates the total price of all the books and kratmeisters
    // if overige_producten is used in the in future this code should be appended
    private function calculatePrice($books, $kratmeisters)
    {
        $totalPrice = 0;
        $nrOfBooksBought = 0;
        if ($books != NULL) {

            foreach (json_decode($books, true) as $book) {
                error_log(print_r($book, true));
                $totalPrice = $totalPrice + ($book['book_count'] * $book['book_price']);
                $nrOfBooksBought = $nrOfBooksBought + $book['book_count'];
            }
        }

        if ($kratmeisters != NULL) {
            foreach (json_decode($kratmeisters, true) as $kratmeister) {
                $totalPrice = $totalPrice + ($kratmeister['kratmeister_sticker_price'] + $kratmeister['kratmeister_beer_price']);
            }
        }
        // if more than one book is bought the buyer get 5 euro discount

        if ($nrOfBooksBought > 1) {
            $totalPrice = $totalPrice - 5;
        }

        return $totalPrice;
    }

    //delete after testing
    // public function preparePayment()
    // {
    //     $payment = Mollie::api()->payments()->create([
    //         'amount' => [
    //             'currency' => 'EUR', // Type of currency you want to send
    //             'value' => '10.00', // You must send the correct number of decimals, thus we enforce the use of strings
    //         ],
    //         'description' => "test deze sizzle",
    //         'redirectUrl' => route('paymentSucces'),
    //         "webhookUrl" => 'http://8900-85-147-241-163.ngrok.io/webhookmollie',
    //         "metadata" => [
    //             "order_id" => "1",
    //             "firstname"
    //         ],
    //     ]);

    //     $payment = Mollie::api()->payments()->get($payment->id);

    //     // redirect customer to Mollie checkout page
    //     return redirect($payment->getCheckoutUrl(), 303);
    // }

    //This methods acts on the mollie webwhook call, and saves the state
    // of the payment. The most important state is if the payment isPaid().
    //After a payment is marked as isPaid the user gets an Order confirmation email.
    public function handleWebhookNotification(Request $request)
    {

        $paymentId = $request->input('id');
        $payment = Mollie::api()->payments->get($paymentId);

        if ($payment->isPaid()) {
            $order = Order::find($payment->metadata->order_id);
            $order->paymentStatus = 'is_paid';
            $order->save();
            Mail::to($order->email)->send(new OrderBevestiging($order->id));
            Mail::to('info@511445105.swh.strato-hosting.eu')->send(new OrderBevestiging($order->id));



        }else{ // other states are failed, pending, cancelled etc.
            $order = Order::find($payment->metadata->order_id);
            $order->paymentStatus = $payment->status;
            $order->save();
        }
    }

    // redirect to payment is succesfull and thank you page
    public function paymentSuccess()
    {
        return view('orders.paymentsuccess');
    }

    //Stores the customers information plus the sessions data for the books and kratmeister
    // as an order in the database. And creates the mollie payment.
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'streetname' => 'required',
            'housenumber' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            'phonenumber' => 'required',
            'email' => 'email|required',

        ]);

        $sessionHasProducts = false;

        //check if there are product in sessionBooksb
        // next version change sessionBooksb name
        if ($request->session()->has('sessionBooksb')) {
            $sessionBooksArray = json_decode($request->session()->get('sessionBooksb'), true);
            if (count($sessionBooksArray) > 0) {
                $sessionHasProducts = true;
            }
        }
        //check if there are products in sessionKratmeistertest
        // next version change sessionKratmeistertest name
        if ($request->session()->has('sessionKratmeistertest')) {
            $sessionKratmeister = json_decode($request->session()->get('sessionKratmeistertest'), true);
            if (count($sessionKratmeister) > 0) {
                $sessionHasProducts = true;
            }
        }

        //this check shouldnt be necessary because the order button/bestel button should not be present if there are not products in the cart
        if ($sessionHasProducts == true) {

            $order = new Order();
            $order->firstname   = $request->input('firstname');
            $order->lastname   = $request->input('lastname');
            $order->housenumber   = $request->input('housenumber');

            $order->streetname   = $request->input('streetname');
            $order->postcode  = $request->input('postcode');
            $order->city   = $request->input('city');
            $order->phonenumber   = $request->input('phonenumber');
            $order->email  = $request->input('email');
            $order->book_orders  = $request->session()->has('sessionBooksb') ? $request->session()->get('sessionBooksb') : NULL;
            $order->kratmeister_orders  = $request->session()->has('sessionKratmeistertest') ? $request->session()->get('sessionKratmeistertest') : NULL;
            $order->paymentStatus  = "not_payed";
            $molliePrice = $this->calculatePrice($order->book_orders, $order->kratmeister_orders);
            $order->total_order_price  = strval($molliePrice);
            $order->save();


            // create the mollie payment
            $payment = Mollie::api()->payments()->create([
                'amount' => [
                    'currency' => 'EUR', // Type of currency you want to send
                    'value' => strval(number_format($molliePrice, 2, '.', '')), // You must send the correct number of decimals, thus we enforce the use of strings
                ],
                'description' => "order_" . strval($order->id),  //." ".$order->firstname." ".$order->lastname." ".$order->phonenumber." ".$order->email
                'redirectUrl' => route('paymentSucces'),
                "webhookUrl" => 'http://511445105.swh.strato-hosting.eu/webhookmollie', // for local testing of the webhook use ngrok, for example 'http://36c6-85-147-241-163.ngrok.io/webhookmollie'
                "metadata" => [
                    "order_id" => strval($order->id),
                    "voornaam" => strval($order->firstname),
                    "achternaam" => strval($order->lastname),
                    "email" => strval($order->email),
                    "telefoonnummer" => strval($order->phonenumber),

                ],
            ]);
            $payment = Mollie::api()->payments()->get($payment->id);
            $order->mollie_id  = $payment->id;
            $order->save();
            $request->session()->flush(); // flush sessesion to remove all shopping cart items
            return redirect($payment->getCheckoutUrl(), 303);
        } else {
            //rediret to homepage
            return redirect("/");
        }
    }

    //Display the specified order data
    public function show($id)
    {
        // echo "show deze order details ".$id;

        return view('orders.show',["order"=>Order::find($id)]);
    }



    // update the paymentStatus of the order.
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if($order != null){



        switch ($request->input('action')) {
            case 'shipped':

                $order->paymentStatus = "shipped";
                $order->save();
                return redirect(route('adminOrders'));

                break;

            case 'retour':
                $order->paymentStatus = "retour";
                $order->save();
                return redirect(route('adminOrders'));


        }
    }
    else{
        echo "order is niet gevonden in database stuur me even email";
    }
    }


}
