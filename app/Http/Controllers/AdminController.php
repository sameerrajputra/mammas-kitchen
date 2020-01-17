<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() 
    {
    	//dd('here');
    	return view('admin.dashboard');
    }
}
