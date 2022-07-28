<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    
    return view('welcome');
});

Route::get('/about', function(){
    $title = 'About Page';
    // return view('pages.about', compact('title'));  // Heae pass title from server to client using this.
    return view('pages.about')->with('title', $title);  // Heae pass title from server to client using this.

});

Route::get('/service', function(){
    $data = array(
        'title'=> 'Service Page.',
        'laguages'=> ['Python', 'Laravel', 'PHP', 'Agular']
    );
    return view('pages.service')->with($data);
});

Route::resource('posts', PostController::class); 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
