<?php

namespace App\Http\Controllers;

use App\RadGroupcheck;
use Illuminate\Http\Request;

class RadGroupcheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $radgroup = RadGroupcheck::orderBy('id', 'desc')->paginate(2);
        return view('radius.radgroupcheck.index', compact('radgroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('radius.radgroupcheck.create');
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
            'groupname' => 'required|unique:radgroupcheck|min:4|max:35',
            'attribute' => 'required',
            'op' => 'required',
            'value' => 'required|min:2',
        ]);

        RadGroupcheck::create($request->all());
        return redirect()->route('radgroupcheck.index')
            ->with('success','Group created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RadGroupcheck  $radGroupcheck
     * @return \Illuminate\Http\Response
     */
    public function show(RadGroupcheck $radGroupcheck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RadGroupcheck  $radGroupcheck
     * @return \Illuminate\Http\Response
     */
    public function edit(RadGroupcheck $radgroupcheck)
    {
       return view('radius.radgroupcheck.edit', compact('radgroupcheck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RadGroupcheck  $radGroupcheck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RadGroupcheck $radgroupcheck)
    {
        $request->validate([
            'groupname' => 'required|min:4|max:35',
            'attribute' => 'required',
            'op' => 'required',
            'value' => 'required|min:2',
        ]);

        $radgroupcheck->update($request->all());
        return redirect()->route('radgroupcheck.index')
            ->with('success','Group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RadGroupcheck  $radGroupcheck
     * @return \Illuminate\Http\Response
     */
    public function destroy(RadGroupcheck $radGroupcheck)
    {
        //
    }
}
