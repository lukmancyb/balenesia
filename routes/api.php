<?php

use App\Posts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/test', function () {

    $post = User::all();
    // $data= array(
    //     'data' => $post
    // );
    // var_dump($post);

    // foreach($post as $item){
    //     echo $item->name;
    // }

    // echo $post;

    return view('test', ['post' => $post] );
   
    
});

