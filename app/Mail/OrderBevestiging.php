<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Order;


class OrderBevestiging extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $order;

    public function __construct($orderID){
        ;
        // $order = new Order();
        $this->user = "Test";
        $this->order = Order::find($orderID);


    }

    public function build(){
        
        return $this->subject('The Wild East orderbevestiging voor id: '.$this->order->id)
                    ->view('mail.orderConfirmation');
    }
}
