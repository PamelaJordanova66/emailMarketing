<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::orderBy('id', 'DESC')->get();
        return view('group.index', compact('groups'));
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
        ],
        [
            'name.required' => 'Enter name',
        ]);
        
        try {
            new Group($request->name);
            session()->flash('success','Group created successfully');
        } catch (\Exception $e) {
            //add log here
            session()->flash('error','Group was not created. Please try again.');
        }
        
        return redirect()->route('group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('group.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $this->validate($request,[
            'name' => 'required',
        ],
        [
            'name.required' => 'Enter name',
        ]);
        
        try {
            $group->update([
                'name' => $request->name,
            ]);
            session()->flash('success','Group updated successfully');
        } catch (\Exception $e) {
            //add log here
            session()->flash('error','Group was not updated. Please try again.');
        }
        return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        if($group->delete())
            session()->flash('success','Group deleted successfully');
        else
            session()->flash('error','Group was not deleted. Please try again.');
        return redirect()->route('group.index');
    }
}
