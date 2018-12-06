<!DOCTYPE>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/stype.css"> 
    </head>
    <body>
        <a href="{{ route('food.getAdd') }}"> Them moi </a>
        <h2>Danh sach cac mon an </h2>
        <div>
            <table class="table table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Size</th>
                        <th>Mô tả ngắn</th>
                        <th>Chi tiet</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $food)
                    <tr>
                        <td></td>
                        <td>{{ $food->name }}</td>
                        <td>{{ $food->price }}</td>
                        <td>{{ $food->size }}</td>
                        <td>{{ $food->description }}</td>
                        <td>{{ $food->information }}</td>
                        <td>
                            <a href="{{ route('food.getEdit', $food->id) }}" title="Chỉnh sửa">Edit</a>
                            <form action=" {{ route('food.delete', $food->id) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" title="Xóa">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach       
                </tbody>
            </table>          
        </div>
    </body>
</html>
