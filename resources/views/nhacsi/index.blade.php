@extends('layouts.master')
@section('title')
    Danh sách nhạc sĩ
@endsection
@section('content')
    <a href="{{route('nhacsi.create')}}">
        <button class="btn">Thêm mới</button>
    </a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ngày sinh</th>
                <th>Quê quán</th>
                <th>Ảnh</th>
                <th>NGày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->ten}}</td>
                <td>{{$item->anh}}</td>
                <td>{{$item->ngaysinh}}</td>
                <td>{{$item->quequan}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td>
                    <a href="{{route('nhacsi.show', $item->id)}}">Xem</a>
                    <a href="{{route('nhacsi.edit', $item->id)}}">Sửa</a>
                    <form action="{{route('nhacsi.destroy', $item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('ok xóa không')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
