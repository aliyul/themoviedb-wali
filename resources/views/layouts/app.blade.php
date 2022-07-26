<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
        <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">

               <link rel="stylesheet" href="{{ asset('css/main.css') }}">

            <!-- Scripts -->

                <!-- Styles -->
                <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                <title>Movies CRUD On Local Database</title>
                </head>

        <body class="font-sans bg-gray-900 text-white">
        <nav class="border-b border-gray-800">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
                <h1>Movies CRUD On Local Database</h1>
            </div>
            </nav>

        @yield('content')
        <footer class="border border-t border-gray-800">
            <div class="container mx-auto text-sm px-4 py-6" style="text-align: center">

                Developed by <a href="" class="underline hover:text-gray-300"> Waliyulloh</a>
            </div>

        </footer>
        @yield('scripts')

</body>
</html>
