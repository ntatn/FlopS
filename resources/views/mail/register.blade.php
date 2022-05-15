<h1>Chào bạn {{ $data['name'] }}</h1>
<h2>Chúc mừng bạn đã đăng ký tài khoản thành công vui lòng xác minh tài khoản !</h2>
<a href="http://127.0.0.1:8000/activation/{{ $data['hash'] }}">Xác minh</a>