@extends('layouts.master')
@section('title', 'Sửa danh mục')
@section('content-title', 'Sửa danh mục')
@section('content')

<form action="{{BASE_URL}}categories/update/{{$category->id_cate}}" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="">Tên danh mục</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$category->name_cate}}">
    
  </div>
 
    <div><button type="submit" class="btn btn-primary">Update</button></div>
</form>


@endsection