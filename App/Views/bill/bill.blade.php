@extends('layouts.master')
@section('title', 'Danh sách sản phẩm')
@section('content-title', 'Bill')
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Name Product</th>
        <th scope="col">Total</th>
        <th scope="col">Image</th>

        <th scope="col">Status</th>
        <th scope="col">Category</th>
        
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Đinh Quang Trung</td>
        <td>Quần bò</td>
        <td>500000 đ</td>
        
        <td>
            <img src="{{BASE_URL}}public/img/z3623928566759_6e27ad5665ff6eb801cc4d69ffb1a2a1.jpg" alt="" width="100">
        </td>
        <td>Thành công</td>
        <td>Quần</td>
        
      </tr>
      
    </tbody>
  </table>
  

@endsection