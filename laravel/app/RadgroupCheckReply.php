<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadgroupCheckReply extends Model
{
    protected $table = 'radgroupcheckreply';
    protected $fillable = ['group_id', 'attribute', 'op', 'value', 'check_reply'];

    
    public function group(){
        return $this->belongsTo(GroupName::class, 'group_id');
    }
}
