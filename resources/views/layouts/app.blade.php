<!DOCTYPE html>
<html lang="sk">
    <head>
        @include('layouts.partials.head')
    </head>
    <body class="flex flex-col min-h-screen">
        @include('layouts.partials.nav')

        <main role="main" class="w-full mx-auto flex-grow px-8 mt-12">
            @yield('content')
        </main>

        @include('layouts.partials.footer-scripts')
        @include('layouts.partials.footer')
    </body>
</html>