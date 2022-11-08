@extends('layouts.admin')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
                </header>
                <div class="panel-body">

                    {{-- // $message = Session::get('message');
                    // if ($message) {
                    // echo '<div class="text-center">
                        // <span class="text-alert ">
                            // ' .
                            // $message .
                            // '
                            // </span>
                        // </div>';
                    // Session::put('message', null);
                    // } --}}
                    @if (Session::get('message'))
                        <div class="text-center">
                            <span class="text-alert ">{{Session::get('message')}}</span>
                        </div>
                    @endif

                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/admin/save_category') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="category_name">Tên danh mục</label>
                                <input type="text" name="category_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="category_status" id="" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category" class="btn btn-info">Thêm danh mục</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
