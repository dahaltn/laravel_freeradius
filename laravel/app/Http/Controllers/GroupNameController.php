<?php

namespace App\Http\Controllers;

use App\GroupName;
use Illuminate\Http\Request;

class GroupNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = GroupName::paginate(5);
        return view('radius.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('radius.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'groupname' => 'required',
        ]);
        GroupName::create($request->all());

        return redirect()->route('groups.index')
            ->with('success','Group created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GroupName  $groupsName
     * @return \Illuminate\Http\Response
     */
    public function show(GroupName $groupsName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GroupName  $groupsName
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupName $group)
    {
        return view('radius.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GroupName  $groupsName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupName $group)
    {
        $request->validate([
            'groupname' => 'required',
        ]);
        $group->update($request->all());

        return redirect()->route('groups.index')
            ->with('success','Group created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GroupName  $groupsName
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupName $groupsName)
    {
        //
    }
}
