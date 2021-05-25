<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    //Relacion de Uno a Muchos//Un solo modelo puede tener muchos comentarios
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    //Relacion de Uno a Muchos//Una imagen puede tener muchos likes
    public function likes(){
        return $this->hasMany('App\Models\Like');

    }

    //Relacion de Muchos a Uno//Muchas imagenes pueden tener un único usuario
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
