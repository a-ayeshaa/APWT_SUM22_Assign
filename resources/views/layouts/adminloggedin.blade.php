<html>
    <head>
        <h3>
        <a href="{{route('admin.home')}}">DASHBOARD || </a>
        <a href="{{route('admin.details')}}">DETAILS</a>
        </h3>
    </head>
    <body>
        @yield('content')
        <br>
        <a href="{{ route('user.logout') }}">LOG OUT</a>
    </body>
</html>