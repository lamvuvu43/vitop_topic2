@extends('theme_master.layout.master')
@section('form_edit')
<style>
    .form-group img{
        width: 150px;
        height: auto;
    }
</style>
    <h1 style="text-align: center;color: #0e90d2;font-weight: bold">Thêm sản phẩm mới</h1>
    <form action="{{url('topic2/'.$data_edit->ttsp_id)}}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf  {{--  phương thức post thêm này--}}
        {{--        @method('PUT')  nếu dùng phương thức put delete--}}
        <div class="form-group">
            <label for="tensp"> Tên Sản Phẩm</label>
            <input type="text" name="namesp" id="tensp" class="form-control" value="{{$data_edit->ttsp_tensp}}">
        </div>

        <div class="form-group">
            <label for="hinhsp"> Hình ảnh</label>
            <input type="file" name="imagesp" id="hinhsp" class="form-control" value="{{$data_edit->ttsp_hinhanhsp}}">
            <img onmouseover="bigImg(this)" onmouseout="smallImg(this)" src="/theme_master/production/images/{{$data_edit->ttsp_hinhanhsp}}" alter=" null" >
        </div>
        <div class="form-group">
            <label for="motasp"> Mô tả</label>
            <input type="text" name="detailsp" id="motasp" class="form-control" value="{{$data_edit->ttsp_motasp}}">
        </div>
        <div class="form-group">
            <input type="submit" value="Cập nhật" class="btn btn-primary form-control">
        </div>
    </form>
@endsection()
