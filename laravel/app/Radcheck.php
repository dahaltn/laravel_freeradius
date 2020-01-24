<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radcheck extends Model
{
    protected $table = 'radcheck';
    protected $fillable = ['username', 'attribute', 'op', 'value'];

    public function profile()
    {
        return $this->hasOne(RadcheckProfile::class);
    }
//    public function radusergroup()
//    {
//        return $this->hasOne(\CreateRadusergroupTable::class);
//    }

    public function user_title()
    {
        return ['mr' => 'Mr', 'mrs' => 'Mrs', 'ms' => 'Ms'];
    }
}
