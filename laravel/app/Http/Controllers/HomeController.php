<?php

namespace App\Http\Controllers;

use App\Radacct;
use App\RadgroupCheckReply;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all()->count();
        $online_users = Radacct::whereNull('acctstoptime')->count();
        $disable_group = RadgroupCheckReply::where('value', 'LIKE', 'Reject')->first();
        $disabled_group = DB::table('radgroupcheckreply')->where('value', 'LIKE', 'Reject')
            ->get('group_id')->pluck('group_id');
       $disabled_users = DB::table('radusergroup')->whereIN('group_id', $disabled_group)
           ->count();
       
       $data_uses_today = DB::table('radacct')->where('acctstarttime', '>=', date('Y-m-d', strtotime('yesterday')))
           ->sum('acctoutputoctets');
       if(!empty($data_uses_today)){
           $data_uses_today = round($data_uses_today/1048576, 2);
       }

       $access_denied = DB::table('radpostauth')->where('reply', 'LIKE', 'Access-Reject')
           ->count('id');
        return view('home', compact(['users', 'online_users', 'disabled_users', 'data_uses_today', 'access_denied']));
    }
}
