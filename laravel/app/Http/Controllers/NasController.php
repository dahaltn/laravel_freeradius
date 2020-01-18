<?php

namespace App\Http\Controllers;

use App\Nas;
use App\Radcheck;
use Illuminate\Http\Request;

class NasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $na = Nas::paginate(5);
        return view('radius.nas.index',compact('na'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('radius.nas.create');

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
            'nasname' => 'required',
            'secret' => 'required',
            'type' => 'required',
        ]);
        Nas::create($request->all());

        return redirect()->route('nas.index')
            ->with('success','Nas has been successfully added.');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nas  $nas
     * @return \Illuminate\Http\Response
     */
    public function edit(Nas $na)
    {
        return view('radius.nas.edit', compact('na'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nas  $nas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nas $na)
    {
        $request->validate([
            'nasname' => 'required',
            'secret' => 'required',
            'type' => 'required',
        ]);

        $na->update($request->all());

        return redirect()->route('nas.index')
            ->with('success','Nas updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nas  $nas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nas $na)
    {
        $na->delete();
        return redirect()->route('nas.index')->with('success', 'Nas deleted successfully');

    }
}
