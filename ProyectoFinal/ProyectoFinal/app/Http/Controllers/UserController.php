<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function config(){
        return view('user.config');
    }
    public function subir(){
        return view('user.subir');
    }
}
