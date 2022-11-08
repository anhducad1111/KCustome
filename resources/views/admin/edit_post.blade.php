@extends('layouts.admin')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa bài viết
                </header>
                
                <div class="panel-body">
                    {{-- @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                    @endif --}}
                    <div class="position-center">
                        @foreach ($edit_post as $key => $edit_value)
                            <form role="form" action="{{ URL::to('/admin/update_post/' . $edit_value->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="post_content">Nội dung bài viết</label>
                                    <input type="text" name="post_content" class="form-control"
                                        value="{{ $edit_value->post_content }}">
                                </div>
                                <div class="form-group">
                                    <label for="post_image">Ảnh</label>
                                    <input type="file" name="post_image" class="form-control">
                                    <img src="{{ asset('upload/post/' . $edit_value->post_image) }}" height="100"
                                        width="100">
                                </div>
                                {{-- <div class="form-group">
                                <label for="">Thời gian tạo bài viết</label>
                                <input type="text" name="post_creation_time" class="form-control">
                            </div> --}}
                                <div class="form-group">
                                    <label for="">Danh mục sản phẩm</label>
                                    <select name="category" class="form-control">
                                        @foreach ($category as $key => $cat)
                                            @if ($cat->id == $edit_value->id)
                                                <option selected value="{{ $cat->id }}">{{ $cat->category_name }}
                                                </option>
                                            @else
                                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Hiển thị</label>
                                    <select name="post_status" id=""
                                        class="form-control">{{ $edit_value->post_status }}
                                        <option value="0" {{ $edit_value->post_status == '0' ? 'selected' : '' }}>Ẩn
                                        </option>
                                        <option value="1" {{ $edit_value->post_status == '1' ? 'selected' : '' }}>Hiển
                                            thị</option>
                                    </select>
                                </div>
                                <button type="submit" name="edit_post" class="btn btn-info">Sửa bài viết</button>
                            </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
