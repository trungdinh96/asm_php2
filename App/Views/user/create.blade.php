@extends('layouts.master')

@section('title', 'Tạo mới sản phẩm')

@section('content-title', 'Tạo mới sản phẩm')

@section('content')
<form action="{{BASE_URL}}users/store" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="">User name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Username">
      
    </div>
   
    <div class="form-group">
      <label for="">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
      
    </div> 
   
  <div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="Password">
    
  </div> 
    <div class="form-group">
      <label for="">Ảnh user</label>
      <input type="file" class="form-control" id="exampleInputEmail1" name="avatar" >
      
    </div> 
     
   
      <div>
          <input type="radio" name="status" value="1"> Kích hoạt
          <input type="radio" name="status" value="0"> K Kích hoạt
      </div>
      
      <div><button type="submit" class="btn btn-primary">Tạo mới</button></div>
  </form>
@endsection
