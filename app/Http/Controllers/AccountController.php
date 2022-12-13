<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AccountController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::where('user_id', $id)->get();
        $userData = $user->toArray();
        return view('account.account',compact('userData'));
    }

    public function edit(Request $request)
    {
        $id = auth()->user()->id;
        $profileData = User::where('user_id', $id)->get();
        return view('account.edit',compact('profileData'));
    }

    public function changeName(Request $request)
    {
        $id = auth()->user()->id;
        DB::table('users')
            ->where('_id', $id)
            ->update(
                ['name' => $request->name]
            );
        return redirect('/account/edit');
    }

    public function showPicture(string $route)
    {
        $file = Storage::disk('pictureProfile')->get($route);
        return Image::make($file)->response();
    }

    public function uploadPicture(Request $request)
    {
        if ($request->hasFile('picture')) {
            $id = auth()->user()->id;
            $image      = $request->file('picture');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('pictureProfile')->put('/' . $fileName, file_get_contents($image));
            DB::table('users')
            ->where('_id', $id)
            ->update(
                ['pictureProfile' => $fileName]
            );
            return redirect('/account');
        }
    }
}
