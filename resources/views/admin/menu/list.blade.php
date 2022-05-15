@extends('admin.main')
@section('content')
    <table class="table">
        <thread>
            <tr >
                <th style="width: 60px">ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width:100px">&nbsp;</th>
            </tr>
        </thread>
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>
@endsection
