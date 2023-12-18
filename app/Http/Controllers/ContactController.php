<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Contact::latest()->get();
        return view('contact.index')
            ->with('messages', $messages);
    }
    public function create()
    {
        return view('contact.contact');
    }
    public function send(Request $request)
    {
        $email = new Contact();
        $email->name = $request->name;
        $email->email = $request->email;
        $email->subject = $request->subject;
        $email->message = $request->message;
        $email->save();
        return redirect("/");
    }
}