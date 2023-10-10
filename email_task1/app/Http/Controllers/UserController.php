<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function details()
    {
        return view('user_details');
    }

    
}
