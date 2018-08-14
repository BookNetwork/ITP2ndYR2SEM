<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\registerMail;

class sampleController extends Controller
{
    function mail(){


        $email = request()->input('email');

        $to = "muhammed.fazlan96@gmail.com";
        $subject = "HTML email";
        $message = "hello";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <bookfun388@gmail.com>' . "\r\n";
        $headers .= 'Cc:muhammed.fazlan96@gmail.com' . "\r\n";

        mail($to,$subject,$message,$headers);

        return back()->with('f','succsess');
    }
}
