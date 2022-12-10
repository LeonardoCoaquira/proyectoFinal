<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    
    public function index()
    {
        $id = auth()->user()->id;
        $posts = DB::table('posts')->get();
        $postsData = $posts->toArray();
        return view('post.posts',compact('postsData'));
    }

    public function uploadPost(Request $request)
    {
        $id = auth()->user()->id;
        $post = new Post;
        $post->user_id = $id;
        $post->post_title = $request->title;
        $post->post_content = $request->content;
        $post->save();
        return redirect('/posts');
    }
}
