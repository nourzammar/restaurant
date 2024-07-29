<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link href="{{ asset('css/dashboard/app.css') }}" rel="stylesheet" >
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <!-- القائمة العلوية والشريط الجانبي وغيرها من العناصر الثابتة -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- التذييل وأي عناصر أخرى -->
    </footer>
</body>
</html>
