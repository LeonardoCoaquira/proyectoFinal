<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    //
    public function index()
    {
        $id = auth()->user()->id;
        $users = User::find($id);
        $comments = Comment::All();
        return view('posts.posts', compact('users','comments'));
    }


    public function mostrarFoto(string $ruta)
    {
        $file = Storage::disk('fotos')->get($ruta);
        return Image::make($file)->response();
    }

    public function uploadPost(Request $request)
    {
        if ($request) {

            $id = auth()->user()->id;
            $user = User::find($id);
            $post = $user->Posts()->save(
                new Post(['title' => $request->title,
                'content'=>$request->content,
                ])
            );
    
            return redirect('/posts');
        }
    }

    public function deletePost(Request $request)
    {
        if ($request->id_post) {
            $user = User::where('Posts._id',$request->id_post)
            ->first();
            $user->Posts()->destroy($request->id_post);

            return redirect('/posts');
        }
    }
    public function uploadComment(Request $request)
    {
        if ($request->comment) {
            $id = auth()->user()->id;
            $comment = new Comment;
            $comment->user_id = $id;
            $comment->post_id = $request->post_id;
            $comment->comment = $request->comment;
            $comment->save();
            return redirect('/home');
        }
    }
}
