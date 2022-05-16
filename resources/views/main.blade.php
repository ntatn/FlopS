<!DOCTYPE html>
<html lang="en">

<head>
    @include('head')
</head>

<body class="animsition">

    <!-- Header -->
    <header>
        @include('header')
    </header>

@include('cart')

@yield('content')
@yield('content2')
@yield('content3')
@yield('content4')
@include('foot')

</body>

</html>