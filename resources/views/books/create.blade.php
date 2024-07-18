@extends('layouts.master')
@section('title')
    Thêm sách
@endsection
@section('content')
    <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="mt-3">
            <label class="form-label">Tác giả</label>
            <select name="author_id" class="form-control">
                @foreach($authors as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <label class="form-label">Tên</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mt-3">
            <label class="form-label">Nhà xuất bản</label>
            <input type="text" name="public_company" class="form-control">
        </div>
        <div class="mt-3">
            <label class="form-label">Ảnh</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mt-3">
            <label class="form-label">Số lượng</label>
            <input type="text" name="quantity" class="form-control">
        </div>
        <div class="mt-3">
            <label class="form-check-label">Hoạt động</label>
            <input type="checkbox" class="form-check-input" name="status">
        </div>
        <button type="submit" class="btn btn-success">Tạo mới</button>
    </form>
@endsection
