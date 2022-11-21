<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use App\Models\Bookmark;
use Illuminate\Support\Facades\DB;

class FetchBookmarks extends Component
{
    public function fetch_bookmarks($user_id)
    {
        $categories = Category::with('posts')->get();
        $posts = Post::with('user', 'categories','marks')->join('categories', 'categories.id', '=', 'posts.category_id')->join('users', 'users.id', '=', 'posts.user_id')->join('bookmarks', 'bookmarks.user_id', '=', 'users.id')->get(['categories.category_status','categories.category_name', 'users.name', 'posts.*']);
        $user = DB::table('users')->where('id', $user_id)->get();
        $bookmarks = Bookmark::with('post')->get();
        // dd($bookmarks);
        return view('livewire.fetch-bookmarks')->with('categories', $categories)->with('posts', $posts)->with('user', $user)->with('bookmarks',$bookmarks);
    }
}
