<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Tasks Management System</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>

<body>
    <script src="{{ asset('js/random-color.js') }}"></script>

    <div class="top-banner">
        <h1>Tasks Management System</h1>
    </div>
    @yield('content')

</body>

</html>