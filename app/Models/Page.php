<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $hidden = ['created_at','updated_at'];

    public function fields(){
        return $this->hasMany('App\Models\Page_field');
    }
}
