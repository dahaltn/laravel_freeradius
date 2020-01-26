<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaduserGroup extends Model
{
    protected $table='radusergroup';
    protected $fillable = ['user_id', 'group_id', 'priority'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function group()
    {
        return $this->belongsTo(GroupName::class, 'group_id');
    }
}
