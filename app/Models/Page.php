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

    public function galerys(){
        return $this->hasMany('App\Models\Galery','page_id');
    }

    public function getTextAttribute(){
        return $this->name;
    }

    public function getValueAttribute(){
        return $this->id;
    }

    public function delete(){
        $childs = Page_field::where('page_id',$this->id)->get();
        foreach($childs as $child){
            $child->delete();
        }
        parent::delete();
    }

}
