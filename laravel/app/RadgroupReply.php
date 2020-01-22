<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadgroupReply extends Model
{
    protected $table='radgroupreply';
    protected $fillable = ['groupname', 'attribute', 'op', 'value'];

}
