<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index() {
        $mailData = [
            'title' => 'cím',
            'body' => 'üzenet',
        ];
        Mail::to('my.temporary.test.mailbox+vajon.kell.a.pluszjel@gmail.com')->send(new DemoMail($mailData));
    }
}
