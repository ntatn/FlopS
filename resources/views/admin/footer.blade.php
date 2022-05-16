<!-- jQuery -->
@jquery
@toastr_js
@toastr_render
<script src="/template/plugins/jquery/jquery.min.js"></script>
<script src="/template/js/main.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/dist/js/adminlte.min.js"></script>

@if(count($errors) > 0)
	@foreach($errors->all() as $error)
		toastr.error("{{$error}}");
	@endforeach
@endif
@yield('foot')