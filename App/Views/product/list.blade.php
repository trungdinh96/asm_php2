@extends('layouts.master')
@section('title', 'Danh sách sản phẩm')
@section('content-title', 'Danh Sách sản phẩm')
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Status</th>
        <th scope="col">Describe</th>
        {{-- <th scope="col">Category</th> --}}
        
        <th scope="col">Chức năng</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        
        <td>
            <img src="{{BASE_URL}}{{$product->image}}" alt="" width="100">
        </td>
        <td>{{$product->status}}</td>
        <td>{{$product->mota}}</td>
        {{-- <td>{{$product->cate_id}}</td> --}}
        <td>
          <a href="{{BASE_URL}}products/edit/{{$product->id}}">
            <button class="btn btn-primary">Sửa</button>
        </a>
        <a href="{{BASE_URL}}products/delete/{{$product->id}}">
            <button onclick="return confirm('Bạn có muốn xoá không?');" class="btn btn-danger">Xoá</button>
        </a>   

        </td>
      </tr>
      @endforeach
     
      
    </tbody>
  </table>
  <button ><a href="{{BASE_URL}}/products/create">Thêm sản phẩm</a></button>   

@endsection