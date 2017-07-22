<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|alpha_dash|max:255',
            'last_name' => 'required|string|alpha_dash|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
        ]);
    }

    /**
    * Displays the contact page to the user
    */
    public function display_contact_page(){

        return view("pages.contact");
    }

    /**
    */
    public function send_mail(Request $request) {

        // validate input    
        $validator = $this->validator($request->all());

        // if validation fails 
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $bodymessage = $request['message'];

        // TODO Move to mailable
        Mail::send('email.email_contact', ['title' => $request['subject'], 'bodymessage' => $bodymessage], function ($message)
        {
            $message->to(env('MAIL_FROM_ADDRESS', "NewArkStudiosOffical@gmail.com"));
            $message->subject("Contact form");
        });
    }
}
