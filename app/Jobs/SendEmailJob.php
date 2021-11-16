<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Template;
use App\Models\Group;
use App\Mail\SendTemplateEmail;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $template;
    protected $customer;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customer, $template)
    {
        $this->customer = $customer;
        $this->template = $template;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $email = (new SendTemplateEmail($this->customer, $this->template));

        Mail::to($this->customer->email)
            ->cc($this->template->cc_email)
            ->bcc($this->template->bcc_email)
            ->send($email);
    }
}
