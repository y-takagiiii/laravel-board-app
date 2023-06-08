<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Post;

class FavoriteController extends Controller
{
    public function index() {
        $user = auth()->user();
        $favorites = Favorite::where('user_id','=', $user->id)->get();
        $postIds = $favorites->pluck('post_id');
        $posts = Post::whereIn('id', $postIds)->get();
        return view('favorite.index', compact('posts'));
    }

    public function store($post) {
        $user = auth()->user();
        $favorite = new Favorite();
        $favorite->user_id = $user->id;
        $favorite->post_id = $post;
        $favorite->save();

        return redirect('post');
    }

    public function destroy($post) {
        $favorite = Favorite::find($post);
        $favorite->delete();
        return redirect('post');
    }
}
