<!DOCTYPE>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/stype.css"> 
    </head>
    <body>
        @if(Auth::check())
            <div class="login">
                <a href="#"><span class="hidden-xs">Chào bạn {{ Auth::user()->name }}</span></a>
            </div>
            <div class="login">
                <div class="login">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="hidden-xs">Logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
        @else
            <div class="login">
                <a href="{{ route('login') }}"><span class="hidden-xs">login</span></a>
            </div>
            <div class="login">
                <a href="{{ route('register') }}"><span class="hidden-xs">register</span></a>
            </div>
        @endif
            </div>
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
                        <th>User</th>
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
                        <td>{{ $food->user->name }}</td>
                        <td>
                            <a href="{{ route('food.getEdit', $food->id) }}" title="Chỉnh sửa">Edit</a>
                            <span>
                                <form action=" {{ route('food.delete', $food->id) }}" method="POST">
                                {{ csrf_field() }}
                                    <button type="submit" title="Xóa">Delete</button>
                                </form>
                            </span>
                        </td>
                    </tr>
                    @endforeach       
                </tbody>
            </table>          
        </div>
    </body>
</html>
