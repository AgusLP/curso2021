<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Image;

Route::get('/', function () {
    /*
    $images = Image::all();
    foreach($images as $image){
        echo $image->image_path."</br>";
        echo $image->description."</br>";
        echo $image->user->name.' '.$image->user->surname."<br/>";
        

        echo "<h4>Comentarios</h4>";
        foreach($image->comments as $comment){
            echo $comment->user->name." ".$comment->user->surname.":";
            echo $comment->content."<br/>";
        }

        echo "LIKES: ".count($image->likes);
        echo "<hr/>";
    }
    */
    die();
    return view("welcome");
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
