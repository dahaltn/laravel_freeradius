<?php

namespace App\Http\Controllers;

use App\RadPostauth;
use Illuminate\Http\Request;

class RadPostauthController extends Controller
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
        $radpostauth = RadPostauth::orderby('id', 'desc')->paginate(50);
        return view('radius.radpostauth.index', compact('radpostauth'));

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
     * @param  \App\RadPostauth  $radPostauth
     * @return \Illuminate\Http\Response
     */
    public function show(RadPostauth $radPostauth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RadPostauth  $radPostauth
     * @return \Illuminate\Http\Response
     */
    public function edit(RadPostauth $radPostauth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RadPostauth  $radPostauth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RadPostauth $radPostauth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RadPostauth  $radPostauth
     * @return \Illuminate\Http\Response
     */
    public function destroy(RadPostauth $radPostauth)
    {
        //
    }
}
