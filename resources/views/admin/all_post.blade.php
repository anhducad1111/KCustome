@extends('layouts.admin')
@section('admin_content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê bài viết
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <a href="{{ URL::to('/admin/add_post') }}"><button class="btn btn-sm btn-default">Thêm bài viết </button></a>

            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">#</th>
                        <th>Nội dung bài viết</th>
                        <th>Ảnh</th>
                        <th>Thời gian tạo bài viết</th>
                        <th>Danh mục bài viết</th>
                        <th>Hiển thị</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($posts as $key => $post)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $post->post_content }}</td>
                            <td><img src="{{ asset('upload/post/' . $post->post_image) }} " alt="" height="100"
                                    width="100"></td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->category_name }}</td>
                            <td>
                                @if ($post->post_status == 0)
                                    Ẩn
                                @else
                                    Hiển thị
                                @endif
                            </td>
                            @php
                                $post_id = DB::table('posts')->get('id');
                            @endphp
                            @php
                                // dd($post_id);
                            @endphp
                            <td>
                                <a href="{{ url('/admin/edit_post/' . $post->id) }}"
                                    class="lnr lnr-pencil text-success text-active"></a>
                                <a href="{{ url('/admin/delete_post/' . $post->id) }}"
                                    class="lnr lnr-trash text-danger text"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
