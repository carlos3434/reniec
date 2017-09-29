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

        <!-- sidebar content -->
        <div id="sidebar" class="col-md-4">
            @include('front.layouts.includes.sidebar')
        </div>

        <!-- main content -->
        <div id="content" class="col-md-8">
            @yield('content')
        </div>

    </div>

    <footer class="row">
        @include('front.layouts.includes.footer')
    </footer>

</div>
</body>
</html>