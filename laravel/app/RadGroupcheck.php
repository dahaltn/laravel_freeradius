<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadGroupcheck extends Model
{
    protected $table = 'radgroupcheck';
    protected $fillable = ['groupname', 'attribute', 'op', 'value'];

    //
}
