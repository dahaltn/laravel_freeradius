<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaduserGroup extends Model
{
    protected $table='radusergroup';
    protected $fillable = ['username', 'groupname', 'priority'];
}
