<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\User;

class LikeController extends Controller
{
    public function index(Request $request)
    {
        $likes = Like::all()->where('user_id', '=', Auth::user()->id)->where('post_id', '=', $request->post_id)->first();
        if ($likes == null) {
            $like = new Like;
            $like->user_id = Auth::user()->id;
            $like->post_id = $request->post_id;
            $like->like = $request->isLike;
            $like->save();
        } else {
            $likes->like = $request->isLike;
            $likes->save();
        }
        return [
            'post_id' => $request->post_id
        ];
    }
    public function like(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }else{
                $like = new Like();
            }
        }
        
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;

        if($update){
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }
}
