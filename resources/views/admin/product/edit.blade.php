@extends('admin.main')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="menu">Tên sản phẩm</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Enter...">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Danh mục</label>
                    <select class="form-control" name="category_id">
                        @foreach($menus as $menu)
                        <option value="{{ $menu->id }}" {{ $product->category_id == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="menu">Giá</label>
                    <input type="number" name="price_old" value="{{ $product->price_old }}" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="menu">Giá giảm</label>
                    <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea name="description" id="content" class="form-control" rows="3" placeholder="" style="height: 86px;">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="menu">Hình ảnh</label>
            <input type="file" class="form-control" id="upload">
            <div id="image_show">
                <a href="{{ $product->thumb }}" target="_blank">
                    <img src="{{ $product->thumb }}" width="100px">
                </a>
            </div>
            <input type="hidden" name="thumb" value="{{ $product->thumb }}" id="thumb">
        </div>
        <div class="col-sm-6">
            <label>Muốn kích hoạt</label>
            <!-- radio -->
            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="1" id="active" name="active" {{ $product->active == 1 ? ' checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="0" id="inactive" name="active" {{ $product->active == 0 ? ' checked=""' : '' }}>
                    <label for="inactive" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </div>
    @csrf
</form>
@endsection


@section('foot')
<script>
    CKEDITOR.replace('content');
</script>
@endsection