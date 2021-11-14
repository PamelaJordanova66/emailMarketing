<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Template::orderBy('id', 'DESC')->get();
        return view('template.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email_subject' => 'required',
            'email_message' => 'required',
            'bcc_email' => 'required|email',
            'cc_email' => 'required|email',
            'schedule_sending' => 'required',
        ],
        [
            'name.required' => 'Please enter name',
            'email_message.required' => 'Please enter message'
        ]);
        
        try {
            new Template($request->all());
            session()->flash('success','Template created successfully');
        } catch (\Exception $e) {
            //add log here
            session()->flash('error','Template was not created. Please try again.');
        }
        
        return redirect()->route('template.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        return view('template.edit', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        $this->validate($request,[
            'name' => 'required',
            'email_subject' => 'nullable',
            'email_message' => 'required',
            'bcc_email' => 'nullable|email',
            'cc_email' => 'nullable|email',
            'schedule_sending' => 'nullable',
        ],
        [
            'name.required' => 'Please enter name',
            'email_message.required' => 'Please enter message'
        ]);
        
        try {
            $group->name = $request->name;
            $group->email_subject = $request->email_subject;
            $group->email_message = $request->email_message;
            $group->bcc_email = $request->bcc_email;
            $group->cc_email = $request->cc_email;
            $group->schedule_sending = $request->schedule_sending;
            $group->save();
            session()->flash('success','Group updated successfully');
        } catch (\Exception $e) {
            //add log here
            session()->flash('error','Group was not updated. Please try again.');
        }
        return redirect()->route('template.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        if($template->delete())
            session()->flash('success','Template deleted successfully');
        else
            session()->flash('error','Template was not deleted. Please try again.');
        return redirect()->route('template.index');
    }
}
