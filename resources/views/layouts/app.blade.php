<!DOCTYPE html>
<html lang="sk">
    <head>
        @include('layouts.partials.head')
    </head>
    <body class="flex flex-col min-h-screen">
        @include('layouts.partials.nav')

        <main role="main" class="mx-auto flex-grow">
            @yield('content')
        </main>

        @include('layouts.partials.footer-scripts')
    </body>
</html>