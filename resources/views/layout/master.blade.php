<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - Sparepart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body{
            background: url('https://c4.wallpaperflare.com/wallpaper/933/151/757/dodge-challenger-hellcat-car-wallpaper-preview.jpg');
            background-repeat: no-repeat;
            background-size: 100%;
        }
        .fakeimg {
            height: 200px;
            background: #dc2929;
        }
    </style>
</head>

<body>

    @include('layout.header')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
                @yield('breadcrumb')
            </ol>
        </nav>

        @yield('content')
    </div>

</body>

</html>
