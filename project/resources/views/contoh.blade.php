<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ url('/bootstrap-5.0.0/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Kiw Kiw laravel aman</h1>
        </div>
      </div>
    </div>
    <section id="app">
      <contoh-vue></contoh-vue>
    </section>

    <script src="{{ url('/js/vue.min.js') }}"></script>
    <script src="{{ url('/bootstrap-5.0.0/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
  </body>
</html>