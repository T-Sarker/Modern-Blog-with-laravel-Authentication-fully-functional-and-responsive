<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class exceptionController extends Controller
{
    public function get404(){

    	return view('error.404');
    }

    public function get405(){

    	return view('error.405');
    }
}
