@extends('layouts.master')
@section('title', 'Danh sách danh mục')
@section('content-title', 'Danh Sách danh mục')
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
       
        
        <th scope="col">Chức năng</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
        <th scope="row">{{$category->id_cate}}</th>
        <td>{{$category->name_cate}}</td>
        
        <td>
          <a href="{{BASE_URL}}categories/edit/{{$category->id_cate}}">
              <button>Sửa</button>
          </a>
          <a href="{{BASE_URL}}categories/delete/{{$category->id_cate}}">
              <button onclick="return confirm('Bạn có muốn xoá không?');">Xoá</button>
          </a>
  </td>
      </tr>
      @endforeach
     
      
    </tbody>
  </table>
  <button><a href="{{BASE_URL}}/categories/create">Thêm sản phẩm</a></button>   

@endsection