<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @include('admin.includes.styles')
    @yield('style')
</head>

<body class="navbar-fixed sidebar-nav fixed-nav">
    @include('admin.includes.topnav')
    @include('admin.includes.sidebar')

    <main class="main">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>

    @include('admin.includes.aside')
    @include('admin.includes.footer')
    @include('admin.includes.scripts')
    @yield('script')
</body>

</html>
