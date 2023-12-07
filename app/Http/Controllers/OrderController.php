<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // fungsi index
    public function index(){
        return view('order.order');
    }
}
