    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>AdminBite admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link type="text/css" href="{{asset('css/theme/chartist.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('css/theme/c3.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('css/theme/morris.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('css/theme/style.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('css/dialpad.css')}}" rel="stylesheet">
    @yield('styles')
