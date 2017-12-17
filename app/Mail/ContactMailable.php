<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMailable extends Mailable
{
    use Queueable, SerializesModels;

    // data set for mail corresponds to view if public
    // get from constructor
    protected $title;
    protected $message;
    protected $email;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->title = "Contact from form";
        $this->message = $request['message'];
        $this->email = $request['email'];
        $this->subject = $request['subject'];
        $this->first_name = $request['first_name'];
        $this->last_name = $request['last_name'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        // although not important yet TODO need to set html view for email
        // antm its sanitized text

        // note we use bodymessage here because message is an occupied var
        return $this->view('email.email_contact')
            ->from($this->email)
            ->subject($this->subject)
            ->to(env('MAIL_FROM_ADDRESS', "newarkst@newarkstudios.net"))
            ->with([
                'title' => $this->title,
                'bodymessage' => $this->message,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
            ]);
    }
}
