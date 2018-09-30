<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galery;
use App\Models\Galery_meta;

class GaleryController extends Controller
{
    public function getGalery(Request $request){
        try{
            $id = $request->input('id',null);
            $galery = Galery::where('id',$id)->first();

        }catch (\Exception $e){
            return [
                'message' => "Wystąpił błąd: ".$e,
                'result' => false
            ];
        }
    }

    public function getGaleries(Request $request){
        try{

        }catch (\Exception $e){
            return [
                'message' => "Wystąpił błąd: ".$e,
                'result' => false
            ];
        }
    }

    public function add(Request $request){
        try{

        }catch (\Exception $e){
            return [
                'message' => "Wystąpił błąd: ".$e,
                'result' => false
            ];
        }
    }

    public function edit(Request $request){
        try{

        }catch (\Exception $e){
            return [
                'message' => "Wystąpił błąd: ".$e,
                'result' => false
            ];
        }
    }

    public function delete(Request $request){
        try{

        }catch (\Exception $e){
            return [
                'message' => "Wystąpił błąd: ".$e,
                'result' => false
            ];
        }
    }
}
