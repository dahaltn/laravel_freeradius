<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    protected $table = 'transaction_history';
    protected $fillable = ['transfer_to_id', 'transfer_from_id', 'transfer_by_id', 'transfer_amount', 'remain_after_transfer'];


public function transfer_to_user()
{
    return $this->belongsTo(User::class, 'transfer_to_id');
}

public function transfer_from_user()
{
    return $this->belongsTo(User::class, 'transfer_from_id');
}
public function transfer_by_user()
{
    return $this->belongsTo(User::class, 'transfer_by_id');
}
}
