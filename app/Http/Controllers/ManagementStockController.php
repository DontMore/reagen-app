<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementStockController extends Controller
{
    public function index(){
        return view('management-stock.management-stock');
    }
}
