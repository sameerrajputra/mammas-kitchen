<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
    	
    	$this->validate($request, [
    		'name'=>'required',
    		'email'=>'required|email',
    		'subject'=>'required',
    		'message'=>'required'
    	]);

    	$contact = new Contact();
    	$contact->name = $request->name;
    	$contact->email = $request->email;
    	$contact->subject = $request->subject;
    	$contact->message = $request->message;

    	$contact->save();

    	Toastr::success('Message has been sent successfully.', 'success', ["postion"=>"toast-top-right"]);
    	return redirect()->back();
    }
}
