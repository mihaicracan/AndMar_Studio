<html>
    <head>
        <title>Admin | @yield('title')</title>

        <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,700,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ url('css/lib.css?v=1.0.0') }}">
        <link rel="stylesheet" href="{{ url(elixir('css/app.css')) }}">
        <link rel="stylesheet" type="text/css" href="http://getbootstrap.com/examples/signin/signin.css">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Photo Studio - Admin</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ url('admin/albums') }}">Albums</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('auth/logout') }}">Log Out</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container admin">
            @yield('content')
        </div>

        <script type="text/javascript" src="{{ url('js/lib.js?v=1.0.0') }}"></script>
        <script type="text/javascript" src="{{ url(elixir('js/app.js')) }}"></script>
    </body>
</html>