<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

// session_start();

class PostController extends Controller
{
    public function save_post(Request $request)
    {
        $data = array();
        $data['post_content'] = $request->post_content;
        $data['post_status'] = '1';
        $data['category_id'] = $request->category;
        $data['user_id'] = auth()->id();
        $get_image = $request->file('post_image');
        if($get_image){
            $get_image_name = $get_image->getClientOriginalName();
            $image_name = current(explode('.',$get_image_name));
            $new_image = $image_name.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload/post',$new_image);
            $data['post_image'] = $new_image;
            DB::table('posts')->insert($data);
            Session::put('message', 'Thêm bài viết thành công');
            return Redirect::to('/home');
        }
        $data['post_image'] = '';
        // DB::table('posts')->insert($data);
        Post::create($data);
        Session::put('message', 'Thêm bài viết thành công');
        return Redirect::to('/home');
    }
    public function delete_post($post_id)
    {
        Post::where('id', '=', $post_id)->delete();
        return redirect()->back()->with('message', 'Xoá bài viết thành công');
    }
}
