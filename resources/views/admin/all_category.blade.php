@extends('layouts.admin')
@section('admin_content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê danh mục sản phẩm
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <a href="{{ URL::to('/admin/add_category') }}"><button class="btn btn-sm btn-default">Thêm danh mục
                    </button></a>

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
                        <th>Tên danh mục</th>
                        <th>Hiển thị</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($categories as $key => $cat)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $cat->category_name }}</td>
                            <td>
                                @if ($cat->category_status == 0)
                                    Ẩn
                                @else
                                    Hiển thị
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/admin/edit_category/' . $cat->id) }}"
                                    class="lnr lnr-pencil text-success text-active"></a>
                                <a href="{{ url('/admin/delete_category/' . $cat->id) }}"
                                    class="lnr lnr-trash text-danger text"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer> --}}
    </div>
@endsection
