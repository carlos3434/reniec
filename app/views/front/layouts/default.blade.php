<!doctype html>
<html>
<head>
    @include('front.layouts.includes.head')
</head>
<body>
<div class="container">

    <header class="row">
        @include('front.layouts.includes.header')
    </header>

    <div id="main" class="row">

            @yield('content')

    </div>

    <footer class="row">
        @include('front.layouts.includes.footer')
    </footer>

</div>
</body>
</html>