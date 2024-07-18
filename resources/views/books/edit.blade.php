@extends('layouts.master')
@section('title')
    Cập nhật sách
@endsection
@section('content')
    <form action="{{route('books.update', $book)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-3">
            <label class="form-label">Tác giả</label>
            <select name="author_id" class="form-control">
                @foreach($authors as $id => $name)
                    <option value="{{$id}}" @selected($book->author_id == $id)>{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <label class="form-label">Tên</label>
            <input type="text" name="name" class="form-control" value="{{$book->name}}">
        </div>
        <div class="mt-3">
            <label class="form-label">Nhà xuất bản</label>
            <input type="text" name="public_company" class="form-control" value="{{$book->public_company}}">
        </div>
        <div class="mt-3">
            <label class="form-label">Ảnh</label>
            <input type="file" name="image" class="form-control">
            <img src="{{Storage::url($book->image)}}" width="50" height="50" alt="">
        </div>
        <div class="mt-3">
            <label class="form-label">Số lượng</label>
            <input type="text" name="quantity" class="form-control" value="{{$book->quantity}}">

        </div>
        <div class="mt-3">
            <label class="form-check-label">Hoạt động</label>
            <input type="checkbox" class="form-check-input" name="status" @checked($book->status)>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
@endsection
