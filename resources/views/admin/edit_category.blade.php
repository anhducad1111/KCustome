@extends('layouts.admin')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa danh mục sản phẩm
                </header>
                
                <div class="panel-body">
                    {{-- @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                    @endif --}}
                    <div class="position-center">
                        @foreach ($edit_category as $key => $edit_value)
                        <form role="form" action="{{ URL::to('/admin/update_category/'.$edit_value->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="category_name">Tên danh mục</label>
                                <input type="text" name="category_name" class="form-control" value="{{ $edit_value->category_name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Hiển thị</label>
                                <select name="category_status" id="" class="form-control input-sm m-bot15" >{{ $edit_value ->category_status }}
                                    <option value="0" {{ $edit_value->category_status == "0" ? 'selected' : '' }}>Ẩn</option>
                                    <option value="1" {{ $edit_value->category_status == "1" ? 'selected' : '' }}>Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category" class="btn btn-info">Thêm danh mục</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
