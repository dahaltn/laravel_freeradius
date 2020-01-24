<?php

namespace App\Http\Controllers;

use App\Radcheck;
use App\RadgroupReply;
use App\RaduserGroup;
use App\User;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
        $radcheck = Radcheck::orderBy('id', 'desc')->paginate(20);
//        $radprofile = $radcheck->profile;
        return view('radius.radcheck.index', compact(['radcheck']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Radcheck $radcheck)
    {
        $title = $radcheck->user_title();
        $groups = RadgroupReply::all();
        return view('radius.radcheck.create', compact(['title', 'groups']));
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
            'username' => 'required|unique:radcheck|min:4|max:35',
            'value' => 'required|min:4',
            'title' => 'max:5',
            'first_name' => 'nullable|min:2|max:40',
            'last_name' => 'nullable|min:2|max:40',
            'email' => 'nullable|unique:radcheckprofile|email',
            'phone' => 'nullable|max:24',
            'mobile' => 'nullable|max:24',
            'address' => 'nullable|string|max:100',
            'city' => 'nullable|max:100',
            'district' => 'nullable|max:100',
            'notes' => 'nullable|max:500',
        ]);
        $data['attribute'] = 'Cleartext-Password';
        $data['op'] = ':=';
        $data['created_by'] = !empty(Auth::user())?Auth::user()->id:0;


        $radcheck = Radcheck::create($data);
        $radcheck->profile()->create($data);

        return redirect()->route('radcheck.index')
            ->with('success', 'User created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Radcheck $radcheck
     * @return \Illuminate\Http\Response
     */
    public function show(Radcheck $radcheck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Radcheck $radcheck
     * @return \Illuminate\Http\Response
     */
    public function edit(Radcheck $radcheck)
    {
        $title = $radcheck->user_title();
        $groups = RadgroupReply::all();
        return view('radius.radcheck.edit', compact(['radcheck', 'title', 'groups']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Radcheck $radcheck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Radcheck $radcheck, RaduserGroup $redusergroup)
    {

//        TODO Unique username validation on update
//        TODO extract validation rules
       $data = $request->validate([
            'value' => 'required|min:4',
            'title' => 'max:5',
            'first_name' => 'nullable|min:2|max:40',
            'last_name' => 'nullable|min:2|max:40',
            'email' => 'nullable|email',
            'phone' => 'nullable|max:24',
            'mobile' => 'nullable|max:24',
            'address' => 'nullable|string|max:100',
            'city' => 'nullable|max:100',
            'district' => 'nullable|max:100',
            'notes' => 'nullable|max:500',
        ]);

       $a = RaduserGroup::firstOrNew([
           'username' => 'dahaltn',
           'groupname' => '5Mb_group',
           'priority' => 0
       ]);
       $a->username = 'dahaltn';
       $a->groupname = '10';


        $radcheck->update($data);
//        TODO find laravel way to achieve this
        unset($data['value']);
        $radcheck->profile()->update($data);
        return redirect()->route('radcheck.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Radcheck $radcheck
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Radcheck $radcheck)
    {
        $radcheck->delete();

        return redirect()->route('radcheck.index')->with('success', 'User has been deleted');
    }
}
