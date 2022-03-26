<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;

class ContactUsFormController extends Controller 
{
    // Create Contact Form
    public function createForm(Request $request) {
      return view('site.contato');
    }
    // Store Contact Form data
    public function ContactUsForm(Request $request) {
        // Form validation
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject'=>'required',
            'message' => 'required'
         ]);
        //  Store data in database
       // Contact::create($request->all());
        //  Send mail to admin
        FacadesMail::send('mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('contato@kirk.digital', 'Admin')->subject($request->get('subject'));
        });
       // return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    dd('ok');
    }
}