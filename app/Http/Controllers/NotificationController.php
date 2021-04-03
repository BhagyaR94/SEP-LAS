<?php

namespace App\Http\Controllers;

use App\Mail\OfferMail;
use Mail;

class NotificationController extends Controller
{
    public function sendEmail(){
        $email = 'rathnayake.bhagya94@gmail.com';
   
        $offer = [
            'title' => 'Succesfully Registered on SEP LAS',
            'url' => 'https://sep-las.herokuapp.com/',
            'body' => 'Body of your email is here',
            'regards'=>'Team SEP LAS'
        ];
  
        Mail::to($email)->send(new OfferMail($offer));
   
        return redirect('dashboard/dashboard');
    }
}
