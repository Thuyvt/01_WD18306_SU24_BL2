<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Danh sách nhạc sĩ</h2>
    <table>
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
</body>
</html>
