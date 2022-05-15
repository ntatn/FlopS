@extends('admin.main')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<form action="" method="post">
    <div class="card-body">
        <div class="form-group">
            <label for="menu">Tên danh mục</label>
            <input type="text" class="form-control" value="{{$menu->name}}" id="menu" name="name" placeholder="Enter name">
        </div>

        <div class="form-group">
            <label for="menu">Danh mục</label>
            <select class="form-control" name="parent_id">
                <option value="0" {{ $menu->parent_id == 0 ? 'selected' : ''}}>Parent Directory</option>
                @foreach($menus as $menuParent)
                <option value="{{ $menuParent->id}}" {{ $menu->parent_id == $menuParent->id ? 'selected' : ''}}>{{ $menuParent->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="description" class="form-control" rows="3" placeholder="" style="height: 40px;">{{$menu->description}}</textarea>
        </div>

        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea name="content" id="content" class="form-control" rows="3" placeholder="" style="height: 86px;">{{$menu->content}}</textarea>
        </div>

        <div class="col-sm-6">
            <label>Muốn kích hoạt?</label>
            <!-- radio -->
            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="1" id="active" name="active" {{$menu->active == 1 ? 'checked =""' : ''}}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="0" id="inactive" name="active"{{$menu->active == 0 ? 'checked =""' : ''}}>
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
<!-- <script>
    function myFunction() {
        const list = document.getElementById("menu").classList
        list.add("is-valid")
    }
</script> -->
@endsection

@section('foot')
<script>
    CKEDITOR.replace('content');
</script>
@endsection