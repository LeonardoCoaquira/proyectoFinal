<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GroupController extends Controller
{
    public function index()
    {
        return view('groups.groups');
    }

    public function createGroup(Request $request)
    {
        if ($request->hasFile('picture')) {
            $id = auth()->user()->id;
            $image      = $request->file('picture');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('pictureGroups')->put('/' . $fileName, file_get_contents($image));
            $group = new Group;
            $group->creator = $id;
            $group->name = $request->name;
            $group->description = $request->description;
            $group->picture = $fileName;
            $group->bgColor = $request->bgColor;
            $group->save();
            return redirect('/groups');
        }
    }
}
