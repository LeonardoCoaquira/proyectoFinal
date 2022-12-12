<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::All();
        $comments = Comment::All();
        $animal = Http::GET('https://animalapi.leocoaquira12.repl.co');
        return view('home', compact('users','comments','animal'));
    }

    public function showPictureApp(string $route)
    {
        $file = Storage::disk('app')->get($route);
        return Image::make($file)->response();
    }

}
