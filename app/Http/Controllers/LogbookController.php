<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogbookController extends Controller
{
    public function index(){
        return view('logbook.logbook');
    }
}
