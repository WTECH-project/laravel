<!DOCTYPE html>
<html lang="sk">
    <head>
        @include('layouts.partials.head')
    </head>
    <body>
        @include('layouts.partials.nav')

        <main role="main">
            @yield('content')
        </main>

        @include('layouts.partials.footer-scripts');
    </body>
</html>