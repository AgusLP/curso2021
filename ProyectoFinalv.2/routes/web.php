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
use App\Http\Controllers\UserController;

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
    
    return view("welcome");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/configuracion', [UserController::class, 'config'])->middleware(['auth'])->name('config');
Route::get('/subir', [UserController::class, 'subir'])->middleware(['auth'])->name('subir');
Route::post('/user/update', [UserController::class, 'update'])->middleware(['auth'])->name('user.update');
Route::get('/user/avatar/{filename}', [UserController::class, 'getImage'])->middleware(['auth'])->name('user.avatar');


require __DIR__.'/auth.php';
