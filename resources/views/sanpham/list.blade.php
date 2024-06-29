<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Danh sách sản phẩm</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Mô tả</th>
                <th>Lượt xem</th>
                <th>Danh mục</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listsp as $sp)
            <tr>
                <td> 
                    <a href="{{route('san-pham.list')}}/{{$sp->id}}"> {{$sp->id}}</a>
                </td>
                <td>{{$sp->name}}</td>
                <td>{{$sp->price}}</td>
                <td>{{$sp->img}}</td>
                <td>{{$sp->mota}}</td>
                <td>{{$sp->luotxem}}</td>
                <td>{{$sp->name_danhmuc}}</td>
                <td>
                    <a href="{{route('san-pham.list')}}/xoa/{{$sp->id}}">Xóa</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>