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
        if ($request->group) {
            $id = auth()->user()->id;
            $group = new Group;
            $group->user_id = $id;
            $group->post_id = $request->post_id;
            $group->comment = $request->comment;
            $group->save();
            return redirect('/home');
        }
    }
}
