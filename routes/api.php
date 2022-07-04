<?php

use App\Models\User;
use App\Models\Topic;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TopicController;

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

Route::get('posts', function(){
    // $posts = Post::all();
    $posts = Post::with('topic','author')->get();
    return $posts;
});

Route::get('posts/{id}',function($id){
    $post = Post::find($id);
    return $post;
});

Route::get('topics/{id}', function($id){
    $topic = Topic::find($id);
    $postTopic = $topic->posts()->get();
    return $postTopic;
});

Route::get('users/{id}',function($id){
    $user = User::find($id);
    $postUser = $user->posts()->get();
    return $postUser;
});