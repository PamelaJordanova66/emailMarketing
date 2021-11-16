<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request,[
            'name' => 'required',
            'email_subject' => 'required',
            'email_message' => 'required',
            'bcc_email' => 'nullable',
            'cc_email' => 'nullable',
        ]);
        
        try {
            $template = new Template($validated);
            $template->user_id = Auth::id();
            $template->save();
            session()->flash('success','Template created successfully');
        } catch (\Exception $e) {
            //add log here
            session()->flash('error','Template was not created. Please try again.');
        }
        
        return redirect()->route('templates.index');
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
            'bcc_email' => 'nullable',
            'cc_email' => 'nullable'
        ]);
        
        try {
            $template->update([
                'name' => $request->name,
                'email_subject' => $request->email_subject,
                'email_message' => $request->email_message,
                'bcc_email' => $request->bcc_email,
                'cc_email' => $request->cc_email
            ]);
            session()->flash('success','Template updated successfully');
        } catch (\Exception $e) {
            //add log here
            session()->flash('error','Template was not updated. Please try again.');
        }
        return redirect()->route('templates.index');
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
        return redirect()->route('templates.index');
    }
}
