<!DOCTYPE html>
<html>
<head>
    @include('layouts.header-script')
</head>
<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.footer-script')
</body>
</html>