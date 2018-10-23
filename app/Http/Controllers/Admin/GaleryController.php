<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galery;
use App\Models\Galery_meta;

class GaleryController extends Controller
{
    public function getGalery(Request $request){
        try{
            $id = $request->input('id',null);
            $galery = Galery::where('id',$id)->with('metas')->first();
        }catch (\Exception $e){
            return [
                'message' => "Wystąpił błąd: ".$e,
                'result' => false
            ];
        }
    }

    public function getGaleries(Request $request){
        try{
            $id = $request->input('id',null);
            $galery = Galery::all();
            $pages = Page::all();
            return [
                'message' => "",
                'result' => true,
                'data' => [
                    'galeries' => $galery,
                    'pages' => $pages
                ]
            ];
        }catch (\Exception $e){
            return [
                'message' => "Wystąpił błąd: ".$e,
                'result' => false
            ];
        }
    }

    public function add(Request $request){
        try{
            $newGallery = new Galery();
            $newGallery->name = $request->input('name');
            $newGallery->page_id = $request->input('pageId');
            $newGallery->save();
            return [
                'message' => "Galeria została zapisana.",
                'result' => true
            ];
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

    public function remove(Request $request){
        try{

        }catch (\Exception $e){
            return [
                'message' => "Wystąpił błąd: ".$e,
                'result' => false
            ];
        }
    }
}
