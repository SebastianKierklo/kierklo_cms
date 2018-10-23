<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){

    }

    public function getFields(Request $request){
        return config('fields');
    }

    public function getDashboard(){

    }
}
