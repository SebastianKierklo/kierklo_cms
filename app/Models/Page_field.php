<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page_field extends Model
{
    public function metas(){
        return $this->hasMany('App\Models\Meta');
    }
}
