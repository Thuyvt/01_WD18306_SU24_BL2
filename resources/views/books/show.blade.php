@extends('layouts.master')
@section('title')
@endsection
@section('content')
    <ul>
        <li>Tên: {{$book->name}}</li>
        <li>Nhà suất bản: {{$book->public_companay}}</li>
        <li>Số lượng: {{$book->quantity}}</li>
        <li>Ảnh:
            <img src="{{Storage::url($book->image)}}" alt="">
        </li>
        <li>Trạng thái:
            {{$book->is_active}}
            <input type="checkbox" class="form-check-input" @checked($book->status)>
        </li>
    </ul>
@endsection
