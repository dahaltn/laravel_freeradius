<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $table='billing';
    protected $fillable = ['user_id', 'amount'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
