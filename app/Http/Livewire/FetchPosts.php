<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;

class FetchPosts extends Component
{
    public function render()
    {
        $categories = Category::with('posts')->get();
        $posts = Post::with('user', 'categories')->join('categories', 'categories.id', '=', 'posts.category_id')->join('users', 'users.id', '=', 'posts.user_id')->get(['categories.category_status','categories.category_name', 'users.name', 'posts.*']);
        $user = User::with('posts')->get();
        return view('livewire.fetch-posts')->with('categories', $categories)->with('posts', $posts)->with('user', $user);
    }
    public function addLikeToPost($post_id)
    {
        $user_id = auth()->id();
        $checkLiked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first();
        if ($checkLiked) {
            Like::where('user_id', $user_id)->where('post_id', $post_id)->delete();
        } else {
            Like::create([
                'user_id' => auth()->id(),
                'post_id' => $post_id
            ]);
        }
    }
}
