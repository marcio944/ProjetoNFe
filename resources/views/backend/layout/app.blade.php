<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | {{ config('app.name') }}</title>
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('backend.layout.partials.navbar')
        @include('backend.layout.partials.sidebar')
        @yield('content')
        @include('backend.layout.partials.footer')
    </div>
    @yield('scripts')
</body>
</html>
