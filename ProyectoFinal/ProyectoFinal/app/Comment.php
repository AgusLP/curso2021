<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';

    //Relacion de Muchos a Uno/
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    //Relacion de Muchos a Uno
    public function image(){
        return $this->belongsTo('App\Image', 'image_id');
    }
}
