<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Online-Learning</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @include('student.includes.style')
    @yield('style')
</head>

<body>
    @include('student.includes.topbar')
    @include('student.includes.navbar')

    @yield('content')

    @include('student.includes.footer')
    @include('student.includes.script')
    @yield('script')
</body>

</html>
