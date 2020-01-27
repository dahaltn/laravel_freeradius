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

    public function amount_money_format(){
        $amount = 0;
        if(isset($this->amount)){
            $amount = $this->amount;
        }
        $amount = money_format('Rs %i', $amount);
        return $amount;
    }



}
