<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function index()
	{
		$messages = Contact::all();
		return view('admin.contact.index', compact('messages'));
	}
}
