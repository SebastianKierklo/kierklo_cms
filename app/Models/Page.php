<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function fields(){
        return $this->hasMany('App\Models\Page_field');
    }
}
