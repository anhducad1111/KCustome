@extends('layouts.user')

@section('content')
    <form role="form" action="{{ URL::to('update_user/' . Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="edit_image">
            <div class="profile-photo ">
                <img src="{{ Auth::user()->avatar }}">
            </div>
            <span class="" id="upload_img">
                <div id="element" tabindex="-1"></div><input type="file" name="post_image" class="form-control">
            </span>
        </div>
        <div class="form-group">
            <label for="name">Tên người dùng</label>
            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
        </div>
        <div class="form-group">
            <label for="">Giới tính</label>
            <select name="gender" id="" class="form-control">{{ Auth::user()->gender }}
                <option value="0" {{ Auth::user()->gender == '0' ? 'selected' : '' }}>Nữ</option>
                <option value="1" {{ Auth::user()->gender == '1' ? 'selected' : '' }}>Nam</option>
            </select>
        </div>
        <button type="submit" name="edit_post" class="btn btn-info">Lưu</button>
    </form>
@endsection
