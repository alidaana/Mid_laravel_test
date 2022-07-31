<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMail;
use App\Mail\DeleteMail;

class MailController extends Controller
{
    //
    public function sendMail(){
        Mail::to('fake@mail.com')->send(new NewMail());
        return "sent add";
    }
    public function sendDeleteMail(){
        Mail::to('fake@mail.com')->send(new DeleteMail());
        return "sent delete";
    }
}
