<html>
    <head>
        <meta charset="utf-8">
        @yield('title')
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Hurricane&family=Jost:wght@200&family=Roboto:ital,wght@1,900&family=Smokum&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{url('css/intestazione.css')}}">
        @yield('css')
        @yield('js')
        @yield('text')
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        @yield('content')

        <footer>
            <h2>Federica Cannizzaro 1000004449</h2>
        </footer>
    </body>
</html>