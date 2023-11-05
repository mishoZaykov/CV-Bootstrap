<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ContactsController extends Controller
{
    public function index()
    {

        $products = Products::first();

        // dd($products);

        $hello = '<em>Hello World</em>';

        return view('front.contacts', compact(
                'products',
                'hello'
            )
        );

        // return view('front.contacts', 
        //     [
        //         'products' => $products,
        //         'hello' => $hello
        //     ]
        // );
    }
}
