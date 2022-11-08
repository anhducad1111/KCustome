<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

session_start();

class CategoryController extends Controller
{
    public function all_category()
    {
        $categories = DB::table('categories')->get();
        $manager_category = view('admin.all_category')->with('categories', $categories);
        return view('layouts.admin')->with('admin.all_category', $manager_category);
    }
    public function add_category()
    {
        return view('admin.add_category');
    }
    public function save_category(Request $request)
    {

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_status'] = $request->category_status;

        DB::table('categories')->insert($data);
        Session::put('message', 'Thêm danh mục bài viết thành công');
        return Redirect::to('admin/add_category');
    }
    public function edit_category($category_id)
    {
        $edit_category = DB::table('categories')->where('id', $category_id)->get();
        $manager_category = view('admin.edit_category')->with('edit_category', $edit_category);
        dd($edit_category);
        return view('layouts.admin')->with('admin.edit_category', $manager_category);

    }
    public function update_category(Request $request, $category_id)
    {

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_status'] = $request->category_status;

        DB::table('categories')->where('id', $category_id)->update($data);
        Session::put('message', 'Cập nhật danh mục bài viết thành công');
        return Redirect::to('admin/all_category');
    }
    public function delete_category($category_id)
    {
        Category::where('id', '=', $category_id)->delete();
        return redirect()->back()->with('message', 'Xoá danh mục bài viết thành công');
    }
}
