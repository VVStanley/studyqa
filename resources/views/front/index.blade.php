<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    <link rel="stylesheet" href="/css/jquery.fancybox.css?v=2.1.7" type="text/css" media="screen"/>
    <script type="text/javascript" src="/js/jquery.fancybox.pack.js?v=2.1.7"></script>

    <script type="text/javascript">
        $(".fancybox").fancybox();
    </script>


    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ route('dashboard') }}">Admin</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    @endif

    <div class="content pt-150">
        <div class="title m-b-md">
            Laravel
        </div>

        <div class="links pb-40">
            @forelse($meetings as $meeting)
                <a href="/{{ $meeting->slug }}?utm_site=test_utm_for_studyqa">{{ $meeting->name }}</a>
            @empty
                <a href="{{ route('login') }}">Создайте мероприятия</a>
            @endforelse
        </div>

        <hr>

        <div class="row pt-40 pb-40">
            <div class="col-12">
                <img src="https://fakeimg.pl/350x200/?text=this" alt="" class="rounded img-thumbnail">
                <img src="https://fakeimg.pl/350x200/?text=is" alt="" class="rounded img-thumbnail">
                <img src="https://fakeimg.pl/350x200/?text=Sparta" alt="" class="rounded img-thumbnail">
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="row text-center pt-40 pb-40">
                <div class="col-12">
                    <h1>Gallery</h1>
                </div>

            </div>
            <div class="row">

                @forelse($galleries as $gallery)
                    <div class="col-md-2">
                        <a class="fancybox" rel="group" href="/uploads/{{ $gallery->image }}">
                            <img class="rounded img-thumbnail custom-image" src="/uploads/{{ $gallery->image }}" alt=""/>
                        </a>
                    </div>
                @empty
                    <div class="col-md-2">
                       <p>Добавьте изображения</p>
                    </div>
                @endforelse

            </div>
        </div>


    </div>
</div>


</body>
</html>
