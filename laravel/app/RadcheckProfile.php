<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadcheckProfile extends Model
{
    protected $table = 'radcheckprofile';
    protected $fillable = ['title', 'first_name', 'last_name', 'mobile', 'phone','email', 'address', 'city', 'district', 'notes', 'created_by'];

    public function radcheck(){
        return $this->belongsTo(Radcheck::class);
    }

    public function full_name(){
        return $this->first_name." ".$this->last_name;
    }
}
