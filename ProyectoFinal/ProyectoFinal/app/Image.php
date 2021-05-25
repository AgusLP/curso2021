<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $table = 'images';

    //Relacion de Uno a Muchos//Un solo modelo puede tener muchos comentarios
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    //Relacion de Uno a Muchos//Una imagen puede tener muchos likes
    public function likes(){
        return $this->hasMany('App\Like');

    }

    //Relacion de Muchos a Uno//Muchas imagenes pueden tener un único usuario
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
