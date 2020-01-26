<?php

namespace App\Http\Controllers;

use App\GroupName;
use App\RadgroupCheckReply;
use App\User;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RadiusCustomerController extends Controller
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
        $radius_users = User::orderBy('id', 'DESC')->paginate(20);
        return view('radius.customer.index', compact('radius_users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $groups = GroupName::all();
        $titles = $user->user_title();
        return view('radius.customer.create', compact(['titles', 'groups']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRule());
        $data['created_by'] = !empty(Auth::user()) ? Auth::user()->id : 0;
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        $data['attribute'] = 'Cleartext-Password';
        $data['op'] = ':=';
        $data['value'] = $data['password'];
        $data['check_reply'] = 'check';
        $user->radcheckreply()->create($data);
        $user->radusergroup()->create($data);

        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RadiusUser $radiusUser
     * @return \Illuminate\Http\Response
     */
    public function show(RadiusUser $radiusUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RadiusUser $radiusUser
     * @return \Illuminate\Http\Response
     */
    public function edit(User $customer)
    {
        $titles = $customer->user_title();
        $groups = GroupName::all();
        return view('radius.customer.edit', compact(['customer', 'titles', 'groups']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\RadiusUser $radiusUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $customer)
    {
        $data = $request->validate($this->validationRule($customer->id));
        $user_data = $data;
        unset($user_data['group_id']);
        $user_data['password'] = Hash::make($user_data['password']);

        $customer->update($user_data);

        $radcheck = [
            'value' => $data['password']
        ];
        $customer->radcheckreply()->update($radcheck);

        $customer->radusergroup()->updateOrCreate(
            ['user_id' => $customer->id],
            ['group_id' => $data['group_id']]
        );

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RadiusUser $radiusUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'User deleted successfully.');
    }

    protected function validationRule($customer_id = null)
    {

        return [
            'username' => ['required', 'min:4', 'max:35', Rule::unique('users')->ignore($customer_id)],
            'password' => 'required|min:3|max:200',
            'group_id' => 'required', 'exists:groups,id',
            'title' => 'nullable|max:5',
            'first_name' => 'nullable|min:2|max:40',
            'last_name' => 'nullable|min:2|max:40',
            'email' => ['nullable', 'email', Rule::unique('users')->ignore($customer_id)],
            'phone' => 'nullable|max:24',
            'mobile' => 'nullable|max:24',
            'address' => 'nullable|string|max:100',
            'city' => 'nullable|max:100',
            'district' => 'nullable|max:100',
            'notes' => 'nullable|max:500',
        ];
    }
}
