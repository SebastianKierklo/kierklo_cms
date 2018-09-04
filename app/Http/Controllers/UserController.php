<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function getLogin(){
        if(Auth::user()){
            return redirect('dashboard');
        }
        return view('login');
    }
    public function postLogin(Request $request){
        try{
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                
                return [
                    'result' => true,
                    'message' => 'Udało się zalogować.'
                ];
            }else{
                return [
                    'result' => false,
                    'message' => 'Nie udało się zalogować.'
                ];
            }
        }catch(Exception $e){
            return [
                'result' => false,
                'message' => $e
            ];
        }
        
 
    }
    public function postLogOut(Request $request){
        try{
            Auth::logout();
            return [
                'result' => true,
                'message' => 'Zostałeś wylogowany'
            ];
        }catch(Exception $e){
            return [
                'result' => false,
                'message' => $e
            ];
        }
    }
}
