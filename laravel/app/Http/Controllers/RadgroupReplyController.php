<?php

namespace App\Http\Controllers;

use App\RadgroupReply;
use Illuminate\Http\Request;

class RadgroupReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $radgroupreply = RadgroupReply::orderBy('id', 'DESC')->paginate(2);
       return view('radius.radgroupreply.index', compact('radgroupreply'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('radius.radgroupreply.create');
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
            'groupname' => 'required|unique:radgroupreply|min:2|max:35',
            'attribute' => 'required',
            'op' => 'required',
            'value' => 'required|min:2',
        ]);

        RadgroupReply::create($request->all());
        return redirect()->route('radgroupreply.index')
            ->with('success','Group Reply created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RadgroupReply  $radgroupReply
     * @return \Illuminate\Http\Response
     */
    public function show(RadgroupReply $radgroupReply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RadgroupReply  $radgroupReply
     * @return \Illuminate\Http\Response
     */
    public function edit(RadgroupReply $radgroupreply)
    {
       return view('radius.radgroupreply.edit', compact('radgroupreply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RadgroupReply  $radgroupReply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RadgroupReply $radgroupreply)
    {
        $request->validate([
            'groupname' => 'required|min:2|max:35',
            'attribute' => 'required',
            'op' => 'required',
            'value' => 'required|min:2|max:30',
        ]);
        $radgroupreply->update($request->all());
        return redirect()->route('radgroupreply.index')
            ->with('success','Group Reply updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RadgroupReply  $radgroupReply
     * @return \Illuminate\Http\Response
     */
    public function destroy(RadgroupReply $radgroupReply)
    {

    }
}
