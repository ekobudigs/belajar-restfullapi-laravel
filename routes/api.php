<?php

use App\Http\Controllers\PostsApiController;
use App\Models\Post;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/posts', function(){
//     return Post::all();
// });

Route::get('/posts', [PostsApiController::class,'index']);



Route::post('/posts', [PostsApiController::class,'store']);

// Route::post('/posts', function() {

//     request()->validate([
//         'title' => 'required',
//         'content' => 'required',
//     ]);

//     return Post::create([
//         'title' => request('title'),
//         'content' => request('content'),
//     ]);
// });


Route::put('/posts/{post}', [PostsApiController::class, 'update']);


// Route::put('/posts/{post}', function (Post $post) {

//     request()->validate([
//         'title' => 'required',
//         'content' => 'required',
//     ]);

//     $success = $post->update([
//         'title' => request('title'), 
//         'content' => request('content'), 
//     ]);

//     return [
//         'success' => $success,
//     ];
    
// });


Route::delete('posts/{post}', [PostsApiController::class, 'destroy']);


Route::delete('posts/{post}', function (Post $post) {

    $success = $post->delete();

    return [
        'success' => $success
    ];
    
});