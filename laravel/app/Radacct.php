<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radacct extends Model
{
    protected $table = 'radacct';
    protected $primaryKey = 'radacctid';


    public function acctoutputoctets_to_mb(){
        return round($this->acctoutputoctets / 1048576, 2);
    }
    public function acctinputoctets_to_mb(){
        return round($this->acctinputoctets / 1048576, 2);
    }

    public function online_user(){
        if(empty($this->acctstoptime)){
            return 'Online';
        }
        return 'Offline';
    }
}
