<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>Laracon EU Live Blog</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-TileImage" content="{{ asset('img/apple-touch-icon_144.png') }}">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('img/apple-touch-icon_144.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('img/apple-touch-icon_114.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('img/apple-touch-icon_72.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('img/apple-touch-icon_57.png') }}">

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-18478762-11', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body>

<header class="site-header">
    <div class="container">
        <img src="{{ asset('img/logo.png') }}" alt="Laracon EU" />

        @if (Route::currentRouteNamed('home'))
        <div class="button button-style2 button-style2-active">Live Blog</div>
        @else
        <a class="button button-style2" href="{{ route('home') }}">Live Blog</a>
        @endif

        <a class="button button-style1" href="http://laracon.eu/2014/" target="_blank">Schedule</a>
    </div>
</header>

<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>

<footer class="site-footer">
    <div class="container">
        Copyright &copy; 2014 Laracon EU |
        <a href="http://laracon.eu" target="_blank">Website</a> |
        <a href="https://joind.in/event/view/2097" target="_blank">Joind.in</a> |
        <a href="https://github.com/driesvints/laraconeu-live" target="_blank">Source Code</a>
    </div>
</footer>

</body>
</html>
