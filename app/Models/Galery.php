<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $hidden = ['created_at','updated_at'];

    public function metas(){
        return $this->hasMany('App\Models\Galery_meta');
    }
}
