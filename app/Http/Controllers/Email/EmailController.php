<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;


class EmailController extends Controller
{
    //send email to a group of customers with the choosen template
    public function sendEmail(Request $request)
    {
        foreach(Group::find($request->id)->customers as $customer)
        {
            $template = Group::find($request->id)->template();
            \Mail::to($customer)
            ->cc($template->cc_email)
            ->bcc($template->bcc_email)
            ->queue(new OrderShipped($order));
        }
    }
}
