@extends('layouts.admin')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm bài viết
                </header>
                <div class="panel-body">
                    @php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<div class="text-center">
                                <span class="text-alert ">
                                    '.$message.'
                                </span>
                                </div>';
                            Session::put('message', null);
                        }
                    @endphp
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/admin/save_post') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="post_content">Nội dung bài viết</label>
                                <input type="text" name="post_content" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="post_image">Ảnh</label>
                                <input type="file" name="post_image" class="form-control">
                            </div>
                            {{-- <div class="form-group">
                                <label for="">Thời gian tạo bài viết</label>
                                <input type="text" name="post_creation_time" class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <label for="">Danh mục sản phẩm</label>
                                <select name="category" class="form-control">
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="post_status" id="" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_post" class="btn btn-info">Thêm bài viết</button>
                        </form>
                    </div>
                </div>
                    
            </section>

        </div>
    </div>
@endsection
