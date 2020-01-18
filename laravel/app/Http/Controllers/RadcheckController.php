<?php

namespace App\Http\Controllers;

use App\Radcheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;

class RadcheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $radcheck = Radcheck::paginate(5);
        return view('radius.radcheck.index', compact('radcheck'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('radius.radcheck.create');
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
            'username' => 'required|unique:radcheck|min:4|max:35',
            'attribute' => 'required',
            'op' => 'required',
            'value' => 'required|min:4',
        ]);

        Radcheck::create($request->all());
        return redirect()->route('radcheck.index')
            ->with('success','User created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Radcheck  $radcheck
     * @return \Illuminate\Http\Response
     */
    public function show(Radcheck $radcheck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Radcheck  $radcheck
     * @return \Illuminate\Http\Response
     */
    public function edit(Radcheck $radcheck)
    {
        return view('radius.radcheck.edit', compact('radcheck'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Radcheck  $radcheck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Radcheck $radcheck)
    {
//        Rule::unique('radcheck')->ignore($radcheck->username)
//        TODO Unique username validation on update
        $request->validate([
            'username' => "required", "min:4","max:35", Rule::unique('radcheck')->ignore($radcheck),
            'attribute' => 'required',
            'op' => 'required',
            'value' => 'required|min:4',
        ]);
        $radcheck->update($request->all());
        return redirect()->route('radcheck.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Radcheck  $radcheck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Radcheck $radcheck)
    {
       $radcheck->delete();

       return redirect()->route('radcheck.index')->with('success', 'User has been deleted');
    }
}
