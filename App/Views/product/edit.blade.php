@extends('layouts.master')
@section('title', 'Danh sách sản phẩm')
@section('content-title', 'Sửa sản phẩm')
@section('content')

<form action="{{BASE_URL}}products/update/{{$product->id}}" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="">Tên sản phẩm</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$product->name}}">
    
  </div>
  <div class="form-group">
    <label for="">Giá sản phẩm</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="price" value="{{$product->price}}">
    
  </div> 
  
  <div class="form-group">
    <label for="">Ảnh sản phẩm</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="image" >
    <img src="{{BASE_URL}}{{$product->image}}" alt="">
  </div>    
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Mô tả</label>
    <textarea class="form-control"  rows="3" name="description">{{$product->mota}}</textarea>
  </div>  
    <div>
      <input type="radio" name="status" value="1" {{$product->status == 1 ? 'checked' : ''}}> Kích hoạt
      <input type="radio" name="status" value="0" {{$product->status == 0 ? 'checked' : ''}}> K Kích hoạt
    </div>
    <div><button type="submit" class="btn btn-primary">Update</button></div>
</form>


@endsection