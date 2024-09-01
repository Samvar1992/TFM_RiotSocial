<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title> @yield('title') </title>

</head>
<body>
    @include('menu')
    <div class="general">
        <div class="min-h-full">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8, flex items-center">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>