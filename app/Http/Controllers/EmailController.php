<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use App\Jobs\CustomerJob; 
class EmailController extends Controller
{

    public function sendComment(Request $request)
    {
        //$request->phone;
        $name = $request->name;
        $phone = $request->phone;
        $mail = $request->email;
        $comment = $request->comment;
        $request->validate([
            'name' => 'sometimes|nullable|string|max:255',
            'phone' => 'sometimes|nullable|numeric|digits:10' ,
            'email' => 'sometimes|nullable|string|email|max:255',
            'comment' => 'required|string|max:255',
        ]);
       // dispatch(new CustomerJob($name,$phone,$mail,$comment));
        Mail::to('info@amedegebeya.com')->send(new sendMail($name,$phone,$mail,$comment));
        return redirect(route('welcome'));
       
    }


}
