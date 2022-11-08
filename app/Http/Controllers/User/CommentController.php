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

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'post_id' => 'exists:posts,id|numeric',
            'comment' => 'required|max:255'
        ]);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();

        Session::flash('success', 'Your comment was succesffuly added');
        return redirect()->back();
    }
}
