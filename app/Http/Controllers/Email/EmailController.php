<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Schema;


class EmailController extends Controller
{
    //send email to a group of customers with the choosen template
    public function sendEmail($id)
    {
        $template = Group::find($id)->template()->first();
        foreach(Group::find($id)->customers()->get() as $customer)
        {
            try{
                $email = SendEmailJob::dispatch($customer, $template);
                session()->flash('success','Emails sent successfully');
            } catch (\Exception $e) {
                //add log here
                session()->flash('error','Emails were not sent. Please try again.');
            }
        }
    }
}
