<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class Email extends Controller
{
    public static function sendCode($email, $code)
    {
        $data = [
            // 'sender' => 'متجر اقرأ',
            'subject' => 'رمز تأكيد البريد الالكتروني',
            'body' => 'رمز التاكيد : ' . $code
        ];

        Mail::to($email)->send(new SendEmail($data));
    }
}