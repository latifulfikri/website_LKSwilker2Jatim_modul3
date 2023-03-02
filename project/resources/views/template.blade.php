<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ url('/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ url('/bootstrap-5.0.0/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <title>@yield('page-title')</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid">
            <a href="" class="navbar-brand"><img src="{{ url('/lib/img/nvc-logo.png') }}" alt="nvc logo" style="width: 200px;"></a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-sm-3">
                        <a href="{{ url('/dashboard/admin') }}" class="nav-link active">Admin</a>
                    </li>
                    <li class="nav-item mx-sm-3">
                        <a href="{{ url('/dashboard/vac-center') }}" class="nav-link">Vaksin Sentral</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="app" class="pt-5">
        @yield('content')
    </section>
    <script src="{{ url('/js/vue.min.js') }}"></script>
    <script src="{{ url('/bootstrap-5.0.0/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
  </body>
</html>