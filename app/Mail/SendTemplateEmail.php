<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendTemplateEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $customer, $template;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer, $template)
    {
        $this->customer = $customer;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.custom_template')
            ->with(['customer' => $this->customer,
                    'template' => $this->template])
            ->from(env('EMAIL_FROM'), env('APP_NAME'));
    }
}
