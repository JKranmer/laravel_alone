<!-- Stored in resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Alone - @yield('title')</title>
    </head>
    <body>
        @include('panel.components.navbar')

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>