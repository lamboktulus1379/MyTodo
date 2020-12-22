<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>My Todo</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link href="{{ asset('scss/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('scss/style.scss') }}" rel="stylesheet" type="text/scss">
  <style>

  </style>
</head>

<body>
  <div id="app">
  </div>
  <script src="{{ mix('js/main.js') }}"></script>
</body>

</html>