<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Mail;

use App\Models\User;

class Newsleter extends Controller
{
    public function index() {

        $users = User::first();

        $options = array(
            'BMW',
            'Audi',
        );

        return view('front.sendmail', [
            'user' => $users,
            'options' => $options,
        ]);
    }
    public function send(Request $request) {

        $mailData = [
            'title' => 'Hello',
            'content' => 'Content',
        ];

        try{
            Mail::to($request->email)->send(new SendMail($mailData));
        }catch(\Exception $e){
            print($e);
        }

        return redirect()->back();
    }
}
