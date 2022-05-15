@extends('admin.main')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<form action="" method="post">
    <div class="card-body">
        <div class="form-group">
            <label for="menu">Tên danh mục</label>
            <input type="text" class="form-control" id="menu" name="name" placeholder="Enter name">
        </div>

        <div class="form-group">
            <label for="menu">Danh mục</label>
            <select class="form-control" name="parent_id">
                <option value="0">Danh mục cha</option>
                @foreach($menus as $menus)
                <option value="{{ $menus->id}}">{{$menus->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="description" class="form-control" rows="3" placeholder="" style="height: 40px;"></textarea>
        </div>

        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea name="content" id="content" class="form-control" rows="3" placeholder="" style="height: 86px;"></textarea>
        </div>

        <div class="col-sm-6">
            <label>Muốn kích hoạt?</label>
            <!-- radio -->
            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="1" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="0" id="inactive" name="active">
                    <label for="inactive" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo</button>
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