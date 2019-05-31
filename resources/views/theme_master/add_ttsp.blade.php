@extends('theme_master.layout.master')
@section('add_ttsp')


    <h1 style="text-align: center;color: #0e90d2;font-weight: bold">Thêm sản phẩm mới</h1>
    <form action="{{url('topic2')}}" method="post" enctype="multipart/form-data">
        @csrf
{{--        @method('PUT')  nếu dùng phương thức put delete--}}
        <div class="form-group">
            <label for="tensp"> Tên Sản Phẩm</label>
            <input type="text" name="namesp" id="tensp" class="form-control">
        </div>

        <div class="form-group">
            <label for="hinhsp"> Hình ảnh</label>
            <input type="file" name="imagesp" id="hinhsp" class="form-control">
        </div>
        <div class="form-group">
            <label for="motasp"> Mô tả</label>
            <input type="text" name="detailsp" id="motasp" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Thêm" class="btn btn-primary form-control">
        </div>
    </form>
    @endsection()
