<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\Comment;
use App\Models\Friend;

class FriendController extends Controller
{
    public function index(Request $request) {
        $friend = new Friend;
        $friend->user_id_1 = Auth::user()->id;
        $friend->user_id_2 = $request->friend_id;
        $friend->save();

        return [
            'friend_id' => $request->friend_id
        ];
    }
    public function showFriends($id) {
        $user = User::find($id);
        return view('friend.show')->with('user', $user);
    }
}
