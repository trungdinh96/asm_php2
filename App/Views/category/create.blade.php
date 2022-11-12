@extends('layouts.master')
@section('title', 'Danh sách danh mục')
@section('content-title', 'Thêm danh mục')
@section('content')

@section('content')
    <form action="{{BASE_URL}}categories/store" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Tên danh mục">
        
      </div>
      
        <div><button type="submit" class="btn btn-primary">Tạo mới</button></div>
    </form>
@endsection
