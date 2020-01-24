<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radcheckreply extends Model
{
    protected $table = 'radcheckreply';
    protected $fillable = ['user_id', 'attribute', 'op', 'value', 'check_reply'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
