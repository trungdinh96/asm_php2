<!-- Kế thừa lại layout master -->
@extends('layouts.master')

<!-- Truyền giá trị cho những phần thay đổi -->
<!-- yield(tên)  ~ section(tên, giá trị) -->
@section('title', 'Danh sách người dùng')

<!-- yield(tên) ~ section(tên) nội dung endsection -->
@section('content-title', "Danh sách người dùng " )
@section('content')
    <a href="{{BASE_URL}}users/create">
        <button class="btn btn-primary">Tạo mới</button>
    </a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Ảnh đại diện</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td><img src="{{BASE_URL}}{{ $user->avatar }}" alt="{{$user->username}}" width="100px" /></td>
                <td>{{$user->status }}</td>
                <td>
                    <a href="{{BASE_URL}}users/edit/{{$user->id}}">
                        <button>Sửa</button>
                    </a>
                    <a href="{{BASE_URL}}users/delete/{{$user->id}}">
                        <button onclick="return confirm('Bạn có muốn xoá không?');">Xoá</button>
                    </a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button ><a href="{{BASE_URL}}/users/create">Thêm user</a></button>  
@endsection
