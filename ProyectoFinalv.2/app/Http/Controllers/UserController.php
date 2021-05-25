<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    //
    public function config(){
        return view('user.config');
    }

    public function subir(){
        return view('user.subir');
    }

    public function update(Request $request){
        

        //Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        //Validacion del formulario
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        
        ]);

        //Recoger datos del formulario
        $id = \Auth::user()->id;
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        //Asignar nuevos valores al objeto del usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick =  $nick;
        $user->email = $email;

        
        //Subir imagenes

        $image_path = $request->file('image_path');
        if($image_path){

            //Ponerle un nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();
            //$path = $request->file('image_path')->storeAs('images', $image_path_name);
            //$request->image_path->move(public_path('images'), $image_path_name);
            /*
            //Guaradar en la carpeta storage ('storage/app/users')
            Storage::disk('users')->put($image_path_name, File::get($image_path));
            */

            //Set del nombre de la imagen el en objeto
            $user->image = $image_path_name;
        }
        


        //Hacer la consulta y cambios en la DB
        $user->update();

        return redirect()->route('config') ->with('message','Cambios realizados');
        
    }
    /*
    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }
    */
}

