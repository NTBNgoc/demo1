<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <ul>
            <li>
                <a>{{ Auth::user()->name }}</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>  
        </ul>
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    {{ session('status') }}
            </div>
        @endif
        <form action=" {{ route('food.getAdd') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            {{ isset($food) ? method_field('PUT') : ''}}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label>Tên món ăn</label>
                <input type="text" class="form-control" name="name" placeholder="Tên món ăn" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('food_id') ? 'has-error' : '' }}">
                <label>Giá món ăn</label>
                <input type="text" class="form-control" name="price" placeholder="Giá món ăn" value="{{ old('price') }}">
                @if($errors->has('price'))
                    <span class="help-block">{{ $errors->first('price') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
                <label>Kích cỡ</label>
                <input type="text" class="form-control" name="size" placeholder="Giá món ăn" value="{{ old('size') }}">
                @if($errors->has('size'))
                    <span class="help-block">{{ $errors->first('size') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" placeholder="Mô tả ngắn" class="ckeditor" class="form-control" id="editor1" rows="3">{{ old('description') }}</textarea>
                <script type="text/javascript">  
                    CKEDITOR.replace( 'editor1' );  
                </script> 
            </div>
            <div class="form-group">
                <label>Thông tin</label>
                <textarea name="information" placeholder="Thông tin món ăn" class="form-control" id="editor2" rows="3">{{ old('information') }}</textarea>
                <script type="text/javascript">  
                    CKEDITOR.replace( 'editor2' );  
                </script> 
            </div> 
            <button type="submit" class="btn btn-success" data-loading-text="<i class='fa fa-cog fa-spin fa-fw'></i> Processing...">Thêm sản phẩm</button>          
        </form>
    </body>
</html>
