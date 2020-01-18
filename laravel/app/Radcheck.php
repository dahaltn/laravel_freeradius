<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radcheck extends Model
{
    protected $table = 'radcheck';
   protected $fillable = ['username', 'attribute', 'op', 'value'];
}
