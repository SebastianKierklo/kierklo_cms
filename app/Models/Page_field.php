<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Meta;

class Page_field extends Model
{
    protected $hidden = ['created_at','updated_at'];
    protected $appends = [];

    public function metas(){
        return $this->hasMany('App\Models\Meta');
    }
}
