@extends('layouts.master')
@section('title')
    Thêm nhạc sĩ
@endsection
@section('content')
    <form action="{{route('nhacsi.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3 mb-3">
            <label for="" class="form-label">Tên</label>
            <input type="text" class="form-control" name="ten">
        </div>
        <div class="row mt-3 mb-3">
            <label for="" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="anh">
        </div>
        <div class="row mt-3 mb-3">
            <label for="" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" name="ngaysinh">
        </div>
        <div class="row mt-3 mb-3">
            <label for="" class="form-label">Quê quán</label>
            <input type="text" class="form-control" name="quequan">
        </div>
        <button type="submit" class="btn btn-primary"> Tạo mới</button>
    </form>
@endsection
