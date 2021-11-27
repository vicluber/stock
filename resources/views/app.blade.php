<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Stock</title>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
    <script>
        window.AppSettings = {
            csrfToken: "{{ csrf_token() }}"
        }
    </script>
</head>

<body>
    <div id="app">
    </div>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>

</html>