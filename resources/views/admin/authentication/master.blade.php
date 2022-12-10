<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="icon" href="{{asset('assets/img/Library.png')}}" type="image/x-icon">
        <link rel="shortcut icon" href="{{asset('assets/img/Library.png')}}" type="image/x-icon">
        <title>@yield('title')</title>
        <!-- Google font-->
        @includeIf('admin.authentication.partials.css')
    </head>
    <body>
        <!-- Loader starts-->
        <div class="loader-wrapper">
            <div class="theme-loader">
                <div class="loader-p"></div>
            </div>
        </div>
        <!-- Loader ends-->
        <!-- error page start //-->
        @yield('content')
        <!-- error page end //-->
        <!-- latest jquery-->
        @includeIf('admin.authentication.partials.js')
    </body>
</html>



