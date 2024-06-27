<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    @vite('resources/css/app.css')
    <title>@yield('title', 'Home') | Cloud Contacts </title>
</head>

<body class="bg-zinc-900 text-gray-200">
    <header>
        @include('navbar.navbar')
    </header>

    <main class="container">
        @yield('content')
    </main>

    <script type="text/javascript" src="{{ asset('js/nav.js') }}"></script>
</body>

</html>