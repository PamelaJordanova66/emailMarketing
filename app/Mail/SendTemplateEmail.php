<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Schema;

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
        $message = $this->template->email_message;
        $column_names = Schema::getColumnListing('customers');
        foreach($column_names as $column){
            if(strpos($message, $column)){
                $replace_message = str_replace($column, $this->customer->$column, $message);
                $message = $replace_message;
                $this->template->update(['email_message'=>$message]);
            }
        }
        return $this->view('email.custom_template')
            ->with(['template' => $this->template])
            ->from(env('EMAIL_FROM'), env('APP_NAME'));
    }
}
