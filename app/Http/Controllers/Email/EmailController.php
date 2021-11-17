<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\DB;


class EmailController extends Controller
{
    //send email to a group of customers with the choosen template
    public function sendEmail($id)
    {
        $template = Group::find($id)->template()->first();
        foreach(Group::find($id)->customers()->get() as $customer){
            SendEmailJob::dispatch($customer, $template);
        }
        if(DB::table('failed_jobs')->select()->get()->count() > 0) 
            session()->flash('error','Emails were not sent. Please try again.');
        else
            session()->flash('success','Emails sent successfully');

        return redirect()->route('groups.index');
    }
}
