<?php

namespace App\Http\Controllers;

use App\Billing;
use App\User;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billing = Billing::paginate(10);
        return view('radius.billing.index', compact('billing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('radius.billing.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'amount' => 'required|integer',
        ]);
        Billing::create($request->all());

        return redirect()->route('billing.index')
            ->with('success','Amount added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Billing $billing
     * @return \Illuminate\Http\Response
     */
    public function show(Billing $billing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Billing $billing
     * @return \Illuminate\Http\Response
     */
    public function edit(Billing $billing)
    {
       return view('radius.billing.edit', compact('billing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Billing $billing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Billing $billing)
    {
        $request->validate([
//            'user_id' => ['required', 'exists:users,id'],
            'amount' => 'required|integer',
        ]);
        $billing->update($request->all());

        return redirect()->route('billing.index')
            ->with('success','Amount updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Billing $billing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billing $billing)
    {
        //
    }
}
