<?php

namespace App\Http\Controllers;

use App\Radacct;
use Illuminate\Http\Request;

class RadacctController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $radacct = Radacct::orderBy('radacctid', 'desc')->paginate(40);
        return view('radius.radacct.index', compact('radacct'));


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Radacct  $radacct
     * @return \Illuminate\Http\Response
     */
    public function show(Radacct $radacct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Radacct  $radacct
     * @return \Illuminate\Http\Response
     */
    public function edit(Radacct $radacct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Radacct  $radacct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Radacct $radacct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Radacct  $radacct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Radacct $radacct)
    {
        //
    }
}
