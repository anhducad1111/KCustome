<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

session_start();

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function welcome()
    {
        return view('welcome');
    }
    public function adminHome()
    {
        return view('admin.home');
    }
    public function index()
    {
        $categories = Category::with('posts')->get();
        $posts = Post::with('user', 'categories')->join('categories', 'categories.id', '=', 'posts.category_id')->join('users', 'users.id', '=', 'posts.user_id')->get(['categories.category_status','categories.category_name', 'users.name', 'posts.*']);
        $user = User::with('posts')->get();
        return view('user.home')->with('categories', $categories)->with('posts', $posts)->with('user', $user);
    }
    public function myProfile()
    {
        $posts = Post::all()->sortbyDesc('id');
        return view('user.my_profile')->with('posts', $posts);
    }
    public function data()
    {
        $categories = Category::with('posts')->get();
        $posts = Post::with('user', 'categories')->join('categories', 'categories.id', '=', 'posts.category_id')->join('users', 'users.id', '=', 'posts.user_id')->get(['categories.category_status','categories.category_name', 'users.name', 'posts.*']);
        $user = User::with('posts')->get();
        return view('user.data')->with('categories', $categories)->with('posts', $posts)->with('user', $user);
    }
}
