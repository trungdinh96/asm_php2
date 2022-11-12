@extends('layouts.master')
@section('title', 'Danh sách sản phẩm')
@section('content-title', 'Chi tiết sản phẩm')
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Mô tả</th>
        <th scope="col">Ảnh</th>
        
        <th scope="col">Chức năng</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Đinh Quang trung</td>
        <td>Vô giá</td>
        <td>Đẹp trai</td>
        <td>
            <img src="{{BASE_URL}}public/img/z3623928566759_6e27ad5665ff6eb801cc4d69ffb1a2a1.jpg" alt="" width="100">
        </td>
        <td>
         <button><a href="{{BASE_URL}}products/detail">Sửa</a></button>   

        </td>
      </tr>
      
    </tbody>
  </table>

  <button><a href="{{BASE_URL}}/products/create">Thêm sản phẩm</a></button>   
@endsection