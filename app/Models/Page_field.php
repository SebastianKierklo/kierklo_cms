<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page_field extends Model
{
    protected $hidden = ['created_at','updated_at'];
    protected $appends = [];

    public function metas(){
        return $this->hasMany('App\Models\Meta');
    }

    public function delete(){
        $childs = Meta::where('page_field_id',$this->id)->get();
        foreach($childs as $child){
            $child->delete();
        }
        parent::delete();
    }
}
