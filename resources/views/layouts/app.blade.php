<!DOCTYPE HTML>
<!--[if IE 9 ]>    <html lang="en" id="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <title>Get Yes</title>       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <meta name="robots" content="index, follow, noarchive"/>
        <meta name="googlebot" content="noarchive"/>
        <meta name="csrf-token" content="<?php echo csrf_token() ?>">
     
        <link rel="stylesheet" type="text/css" href="{{ asset('cmsstyle/css/jquery.dataTables.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('cmsstyle/css/responsive.dataTables.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('cmsstyle/css/select2.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('cmsstyle/css/grid.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('cmsstyle/css/jquery.scrollbar.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('cmsstyle/css/jquery-ui.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('cmsstyle/css/global.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('cmsstyle/css/big.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('cmsstyle/css/icons.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('cmsstyle/css/colors.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('cmsstyle/css/customization.css') }}" />
        
        <!--jQuery-->
        <script type="text/javascript" src="{{ asset('cmsstyle/js/jquery-1.12.0.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('cmsstyle/js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('cmsstyle/js/jquery.dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('cmsstyle/js/dataTables.responsive.js') }}"></script>
        <script type="text/javascript" src="{{ asset('cmsstyle/js/select2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('cmsstyle/js/tinymce/tinymce.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('cmsstyle/js/jquery.scrollbar.js') }}"></script>
        <script type="text/javascript" src="{{ asset('cmsstyle/js/scripts.js') }}"></script>
    </head>

    <body>
        <div class="login-wrapper">
            <div>
                 @yield('content')
            </div>
        </div>    
    </body>
</html>
