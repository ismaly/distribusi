<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
<body class="bg-soft-blue">
    @include('layout.nav')

        @yield('content')

    @include('layout.script')
</body>
</html>
