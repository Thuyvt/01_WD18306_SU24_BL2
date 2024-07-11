@extends('layouts.master')
@section('title')
    Chi tiết nhạc sĩ
@endsection
@section('content')

    <ul>
        {{--    <li>Tên: {{$model->ten}}</li>--}}
        @foreach(collect($model)->toArray() as $key => $value)
            <li>{{$key}} : {{$value}}</li>
        @endforeach
    </ul>

    <h2>Danh sách âm nhạc</h2>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Nhạc sĩ</th>
            <th>Mô tả</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listAmNhac as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->ten}}</td>
                <td>{{$item->ten_nhacsi}}</td>
                <td>{{$item->mota}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
