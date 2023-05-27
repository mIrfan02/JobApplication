<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    //

    public function sendEmail(Request $request)
    {
        $recipientEmail = $request->input('recipient_email');
        $subject = $request->input('subject');
        $body = $request->input('body');

        $data = [
            'subject' => $subject,
            'body' => $body,
            
        ];

        Mail::send('email', $data, function ($message) use ($recipientEmail, $subject) {
            $message->to($recipientEmail)->subject($subject);
            $message->from('mi@gmail.com', 'laravel');
        });

        return redirect()->back()->with('message','Email sent Successfully');
    }


}
