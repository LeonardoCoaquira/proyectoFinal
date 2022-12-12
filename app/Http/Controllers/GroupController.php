<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $users = User::find($id);
        $comments = Comment::All();
        $groups = Group::All();
        return view('groups.groups', compact('users','groups','comments'));
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
            return redirect('/groups');
        }
    }
}
