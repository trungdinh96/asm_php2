@extends('layouts.master')

@section('title', 'Tạo mới sản phẩm')

@section('content-title', 'Tạo mới sản phẩm')

@section('content')
<form action="{{BASE_URL}}users/update/{{$user->id}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="">User name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$user->username}}">
      
    </div>
   
    <div class="form-group">
      <label for="">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{$user->email}}">
      
    </div> 
   
 
    <div class="form-group">
      <label for="">Ảnh user</label>
      <input type="file" class="form-control" id="exampleInputEmail1" name="avatar" >
      <img src="{{BASE_URL}}{{$user->avatar}}" alt="">
    </div> 
     
   
      <div>
        <input type="radio" name="status" value="1" {{$user->status == 1 ? 'checked' : ''}}> Kích hoạt
        <input type="radio" name="status" value="0" {{$user->status == 0 ? 'checked' : ''}}> K Kích hoạt
      </div>
      
      <div><button type="submit" class="btn btn-primary">Cập nhật</button></div>
  </form>
@endsection
