<?php

namespace App\Http\Controllers;

use App\GroupName;
use App\RadgroupCheckReply;
use Illuminate\Http\Request;

class RadgroupCheckReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group_settings = RadgroupCheckReply::orderBy('id', 'DESC')->paginate(20);
        return view('radius.radgroupcheckreply.index', compact('group_settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group_name = GroupName::all();
        $attributes = $this->attributes();
        return view('radius.radgroupcheckreply.create', compact(['group_name', 'attributes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationrule());
        $group = GroupName::create($data);

        $data['op'] = ':=';
        if ($data['attribute'] == 'Auth-Type') {
            $data['check_reply'] = 'check';
        } else {
            $data['check_reply'] = 'reply';
        }
        $data['group_id'] = $group->id;
        RadgroupCheckReply::create($data);

        return redirect()->route('group-setting.index')
            ->with('success', 'Group mapped successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RadgroupCheckReply $radgroupCheckReply
     * @return \Illuminate\Http\Response
     */
    public function show(RadgroupCheckReply $radgroupCheckReply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RadgroupCheckReply $radgroupCheckReply
     * @return \Illuminate\Http\Response
     */
    public function edit(RadgroupCheckReply $group_setting)
    {
        $group_name = GroupName::all();
        $attributes = $this->attributes();
       return view('radius.radgroupcheckreply.edit', compact(['group_setting','group_name', 'attributes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\RadgroupCheckReply $radgroupCheckReply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RadgroupCheckReply $group_setting)
    {
        $rule = $this->validationrule();
        $rule['groupname'] = 'required';

        $data = $request->validate($rule);
        $data['op'] = ':=';
        if ($data['attribute'] == 'Auth-Type') {
            $data['check_reply'] = 'check';
        } else {
            $data['check_reply'] = 'reply';
        }
        $group_setting->update($data);
        $group_data['groupname'] = $data['groupname'];
        $group_setting->group->update($group_data);

        return redirect()->route('group-setting.index')
            ->with('success', 'Group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RadgroupCheckReply $radgroupCheckReply
     * @return \Illuminate\Http\Response
     */
    public function destroy(RadgroupCheckReply $group_setting)
    {
        $group_setting->delete();
        return redirect()->route('group-setting.index')
            ->with('success', 'Group mapping deleted successfully.');
    }

    protected function attributes()
    {
        return [
            'Mikrotik-Rate-Limit',
            'Mikrotik-Group',
            'Auth-Type'
        ];
    }

    protected function validationrule()
    {
       return [
//            'group_id' => 'required',
            'groupname' => 'required|unique:groups',
            'attribute' => 'required',
            'value' => 'required|max:200'
        ];


    }
}
