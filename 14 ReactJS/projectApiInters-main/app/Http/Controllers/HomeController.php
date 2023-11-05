<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Cars;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $car = new Cars();

        // $car->user_id = 2;
        // $car->brand = "BMW";
        // $car->model = "GT";
        // $car->year = 2015;
        // $car->save();
        return view('front.welcome');
    }

}
