<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class FetchCategories extends Component
{
    public function fetch_categories($category_id)
    {
        $categories = DB::table('categories')->where('id', $category_id)->get();
        $posts = Post::with('user', 'categories')->join('categories', 'categories.id', '=', 'posts.category_id')->join('users', 'users.id', '=', 'posts.user_id')->get(['categories.category_status','categories.category_name', 'users.name', 'posts.*']);
        $user = User::with('posts')->get();
        // dd($categories);
        return view('livewire.fetch-categories')->with('categories', $categories)->with('posts', $posts)->with('user', $user);
    }
}
