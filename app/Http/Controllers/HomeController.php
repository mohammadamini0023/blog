<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */

     // contoroller show home auth
    public function index()
    {
        return view('home');
    }
    // contoriller show page AddProduct
    public function AddProductGet()
    {
        return view('panel.addproduct');
    }
}
