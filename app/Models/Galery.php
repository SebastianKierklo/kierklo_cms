<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $hidden = ['created_at','updated_at'];

    public function metas(){
        return $this->hasMany('App\Models\Galery_meta');
    }

    public function delete(){
        $childs = Galery_meta::where('galeries_id',$this->id)->get();
        foreach($childs as $child){
            $child->delete();
        }
        parent::delete();
    }
}
