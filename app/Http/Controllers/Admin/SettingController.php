<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index(){
        try{
            return [
                'settings' => Setting::all()
            ];
        }catch(Exception $e){
            return [
                'message' => "Wystąpił błąd: ".$e,
                'result' => false
            ];
        }
    }

    public function add(Request $request){
        try{
            $name = $request->input('name',false);
            $value = $request->input('value',false);
            if($name && $value){
                Setting::insert([
                    'name' => $name,
                    'value' => $value
                ]);
                return [
                    'message' => "Obiekt zapisano prawidłowo",
                    'result' => true
                ];
            }else{
                return [
                    'message' => "Wystąpił błąd",
                    'result' => false
                ];
            }
        }catch (Exception $e){
            return [
                'message' => "Wystąpił błąd: ".$e,
                'result' => false
            ];
        }
    }

    public function edit(Request $request){

    }

    public function remove(Request $request){
        try{
            $id = $request->input('id',false);
            if($id){
                $setting = Setting::find($id);
                $setting->delete();
                return [
                    'message' => "Obiekt został skasowany.",
                    'result' => true
                ];
            }else{
                return [
                    'message' => "Wystąpił błąd",
                    'result' => false
                ];
            }
        }catch(Exception $e){
            return [
                'message' => "Wystąpił błąd: ".$e,
                'result' => false
            ];
        }
    }
}
