<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupName extends Model
{
    protected $table = 'groups';
    protected $fillable = ['groupname'];

    public function group_checkreply()
    {
        return $this->hasMany(RadgroupCheckReply::class, 'group_id');
    }

    public function radusergroup()
    {
        return $this->belongsTo(RaduserGroup::class);
    }

}
