<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>Laracon EU Live Blog</title>
    <link rel="stylesheet" href="{{ asset('js/datetimepicker/datetimepicker.min.css') }}">
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
        @if (! Route::currentRouteNamed('home'))
        <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Laracon EU" /></a>
        @elseif (Auth::check())
        <a href="{{ route('admin') }}"><img src="{{ asset('img/logo.png') }}" alt="Laracon EU" /></a>
        @else
        <img src="{{ asset('img/logo.png') }}" alt="Laracon EU" />
        @endif
    </div>
</header>

<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>

<footer class="site-footer">
    <div class="container">
        Copyright &copy; 2014 Laracon EU <span class="separator">|</span>
        <a href="http://laracon.eu" target="_blank">Website</a> <span class="separator">|</span>
        <a href="https://joind.in/event/view/2097" target="_blank">Joind.in</a> <span class="separator">|</span>
        <a href="https://github.com/driesvints/laraconeu-live" target="_blank">Source Code</a>
    </div>
</footer>

<script src="/js/libs/jquery-1.9.1.min.js"></script>

@if (Route::currentRouteNamed('home') && isset($_ENV['PUSHER_KEY']))
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/livestamp.min.js') }}"></script>
<script src="//js.pusher.com/2.2/pusher.min.js" type="text/javascript"></script>
<script type="text/javascript">
    // Enable pusher logging - don't include this in production
    Pusher.log = function(message) {
        if (window.console && window.console.log) {
            window.console.log(message);
        }
    };

    var pusher = new Pusher('{{ $_ENV['PUSHER_KEY'] }}');
    var channel = pusher.subscribe('live_blog');
    channel.bind('blog_message', function(data) {
        var $liveBlog = $("#live-blog"),
            $countdownMessage = $("#countdown-message");

        // If the countdown message is still showing, remove it
        if ($countdownMessage.length) {
            $countdownMessage.remove();
        }

        // Prep and hide the message
        var $thisMessage = $(data.message);

        $thisMessage.css('display', 'none');

        // Add the message to the live blog on top
        $liveBlog.prepend($thisMessage);

        // Animate the message in
        $thisMessage.slideDown();
    });
</script>

@elseif (Route::currentRouteNamed('home'))
    <script>
    // Make fake messages arrive for testing purposes
    var $liveBlog = $('#live-blog'),
        fakeMessage = '<div class="message" style="display: none;"><div class="date"><span data-livestamp="1409098465"></span></div><div class="text">This is another message.</div></div>';

    setInterval(function() {
        var $thisMessage = $(fakeMessage);

        $liveBlog.prepend($thisMessage);

        $thisMessage.slideDown();
    }, 3000);

    </script>
@endif

@if ( ! Route::currentRouteNamed('home'))
<script src="{{ asset('js/datetimepicker/datetimepicker.min.js') }}"></script>
<script>
$(function(){
    var dtBox = $("#dtBox");

    if (dtBox.length) {
        dtBox.DateTimePicker({
            dateTimeFormat: "yyyy-MM-dd HH:mm:ss"
        });
    }
});
</script>
@endif

</body>
</html>
