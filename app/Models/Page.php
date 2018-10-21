<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $hidden = ['created_at','updated_at'];
    protected $appends = ['text','value'];

    public function fields(){
        return $this->hasMany('App\Models\Page_field');
    }

    public function getTextAttribute(){
        return $this->name;
    }

    public function getValueAttribute(){
        return $this->id;
    }
}
