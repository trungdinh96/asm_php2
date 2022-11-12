@extends('layouts.master')
@section('title', 'Danh sách sản phẩm')
@section('content-title', 'Thêm sản phẩm')
@section('content')

@section('content')
    <form action="{{BASE_URL}}products/store" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Tên Sản Phẩm">
        
      </div>
      @error
      <p style="color:red;">
        {{$message}}
    </p>
      @enderror
      <div class="form-group">
        <label for="">Giá sản phẩm</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="price" placeholder="Giá Sản Phẩm">
        
      </div> 
      <p style="color:red;">
        {{ isset($error['price']) ? $error['price'] : '' }}
    </p>
      <div class="form-group">
        <label for="">Ảnh sản phẩm</label>
        <input type="file" class="form-control" id="exampleInputEmail1" name="image" >
        
      </div> 
      <p style="color:red;">
        {{ isset($error['image']) ? $error['image'] : '' }}
    </p>   
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Mô tả</label>
        <textarea class="form-control"  rows="3" name="description"></textarea>
      </div> 
      <div class="form-group">
        <label for="exampleFormControlSelect1">Status</label>
        <select class="form-control" id="exampleFormControlSelect1" name="category">
          @foreach ($category as $category)
          <option value="{{$category->id_cate}}">{{$category->name_cate}}</option>
      @endforeach
          
          
        </select>
        <div>
            <input type="radio" name="status" value="1"> Còn hàng
            <input type="radio" name="status" value="0"> Hết hàng
        </div>
        <p style="color:red;">
          {{ isset($error['status']) ? $error['status'] : '' }}
      </p>
        <div><button type="submit" class="btn btn-primary">Tạo mới</button></div>
    </form>
@endsection
