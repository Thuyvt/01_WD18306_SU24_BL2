@extends('layouts.backup.app')

@section('content')
    <div class="mt-16 container">
        <h2>Đăng nhâp</h2>
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email">
                @error('email')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" name="password">
            </div>
            @error('password')
            <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
            <button class="btn btn-primary" type="submit">Đăng nhập</button>
        </form>
    </div>
@endsection
