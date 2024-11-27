<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href={{ asset('assets/Logo/logo_ico.png') }} type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Oxanium:wght@200..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/errors.css') }}">
    <title>{{ $title }}</title>
</head>

<body>
    {{ $slot }}
    <div class="astronaut">
        <img src="https://images.vexels.com/media/users/3/152639/isolated/preview/506b575739e90613428cdb399175e2c8-space-astronaut-cartoon-by-vexels.png"
            aria-hidden="true" class="src">
    </div>
    <script src={{ asset('assets/js/errors.js') }}></script>
</body>

</html>
