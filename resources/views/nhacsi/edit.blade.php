@extends('layouts.master')
@section('title')
    Cập nhật nhạc sĩ
@endsection
@section('content')
    <form action="{{route('nhacsi.update', $model->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mt-3 mb-3">
            <label for="" class="form-label">Tên</label>
            <input type="text" class="form-control" name="ten" value="{{$model->ten}}">
        </div>
        <div class="row mt-3 mb-3">
            <label for="" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="anh">
            <img src="{{Storage::url($model->anh)}}" alt="">
        </div>
        <div class="row mt-3 mb-3">
            <label for="" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" name="ngaysinh"  value="{{$model->ngaysinh}}">
        </div>
        <div class="row mt-3 mb-3">
            <label for="" class="form-label">Quê quán</label>
            <input type="text" class="form-control" name="quequan"  value="{{$model->quequan}}">
        </div>
        <button type="submit" class="btn btn-primary"> Cập nhật</button>
    </form>
@endsection
