<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @include('instructor.includes.styles')
    @yield('style')
</head>

<body class="navbar-fixed sidebar-nav fixed-nav">
    @include('instructor.includes.topnav')
    @include('instructor.includes.sidebar')

    <main class="main">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>

    @include('instructor.includes.footer')
    @include('instructor.includes.scripts')
    @yield('script')
</body>

</html>
