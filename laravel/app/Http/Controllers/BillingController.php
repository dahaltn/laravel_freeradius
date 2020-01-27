<?php

namespace App\Http\Controllers;

use App\Billing;
use App\TransactionHistory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $current_user_balance = 0;
        $current_user = 'N/A';
        if (Auth::user()->username) {
            $current_user = Auth::user()->username;
            if (isset(Auth::user()->billing->amount)) {
                $current_user_balance = Auth::user()->billing->amount;
            }
        }
        $users = User::all();
        return view('radius.billing.create', compact(['users', 'current_user', 'current_user_balance']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'amount' => 'required|integer|max:200000|min:1',
        ]);
        $current_user_id = Auth::user()->id ?? 0;
        $current_user_balance = Auth::user()->billing->amount ?? 0;

        if ($data['amount'] > $current_user_balance) {
            return redirect()->route('billing.create')
                ->withErrors(["amount" => "You can't transfer more than your balance Rs {$current_user_balance}"])
                ->withInput();
        }


        $billing = new Billing;
        $bil = $billing->where('user_id', $data['user_id'])->first();
        if (!empty($bil)) {
            $total_balance = $bil->amount + $data['amount'];
            $bil->amount = $total_balance;
            $bil->save();
        } else {
            Billing::create($data);
        }

        $remaining_updated_amount = $current_user_balance - $data['amount'];
        Billing::where('user_id', $current_user_id)
            ->update(['amount' => $remaining_updated_amount]);


        $data = [
            'transfer_to_id' => $data['user_id'],
            'transfer_from_id' => $current_user_id,
            'transfer_by_id' => $current_user_id,
            'transfer_amount' => $data['amount'],
            'remain_after_transfer' => $remaining_updated_amount,
        ];

        TransactionHistory::create($data);

        return redirect()->route('billing.index')
            ->with('success', 'Amount transferred successfully.');
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
        $users = User::all();
        return view('radius.billing.edit', compact(['billing', 'users']));
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
        $data = $request->validate([
//            'user_id' => ['required', 'exists:users,id'],
//            'amount' => 'required|integer|max:200000|min:1',
            'transfer_to_user_id' => ['required', 'exists:users,id'],
            'transfer_amount' => 'required|integer|max:200000|min:1',
        ]);

        $transfer_from_id = $billing->user_id;
        $current_user_id = Auth::user()->id ?? 0;
        $get_user = User::find($transfer_from_id);
        $current_user_balance = $get_user->billing->amount ?? 0;

        if ($data['transfer_amount'] > $current_user_balance) {
//            dd($transfer_from_id);
            return redirect()->route('billing.edit', $transfer_from_id)
                ->withErrors(["amount" => "You can't transfer more than your balance Rs {$current_user_balance}"])
                ->withInput();
        }


        $bil = Billing::where('user_id', $data['transfer_to_user_id'])->first();
        if (!empty($bil)) {
            $total_balance = $bil->amount + $data['transfer_amount'];
            $bil->amount = $total_balance;
            $bil->save();
        } else {
            $create_data = [
                'user_id' => $data['transfer_to_user_id'],
                'amount' => $data['transfer_amount']
            ];
            Billing::create($create_data);
        }

        $remaining_updated_amount = $current_user_balance - $data['transfer_amount'];
        Billing::where('user_id', $transfer_from_id)
            ->update(['amount' => $remaining_updated_amount]);


        $data = [
            'transfer_to_id' => $data['transfer_to_user_id'],
            'transfer_from_id' => $transfer_from_id,
            'transfer_by_id' => $current_user_id,
            'transfer_amount' => $data['transfer_amount'],
            'remain_after_transfer' => $remaining_updated_amount,
        ];

        TransactionHistory::create($data);

        return redirect()->route('billing.index')
            ->with('success', 'Amount updated successfully.');
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


    /**
     * Transfer balance to admin
     *
     * @param  \App\Billing $billing
     * @return \Illuminate\Http\Response
     */
    public function transfer(Request $request)
    {
//        dd($request->all());
        $data = $request->validate([
            'amount' => 'required|min:1|max:200000'
        ]);
        $data['user_id'] = Auth::user()->id ?? 0;
        $existing_amount = Auth::user()->billing->amount ?? 0;
        $total_amount = $existing_amount + $data['amount'];

        Billing::updateOrCreate(
            ['user_id' => $data['user_id']],
            ['amount' => $total_amount]
        );

        $data = [
            'transfer_to_id' => Auth::user()->id,
            'transfer_from_id' => Auth::user()->id,
            'transfer_by_id' => Auth::user()->id,
            'transfer_amount' => $data['amount'],
            'remain_after_transfer' => $total_amount,
        ];

        TransactionHistory::create($data);

        return redirect()->route('settings')
            ->with('success', 'Balance add successfully');

    }

    public function daily_rate(Request $request)
    {


    }
}
