<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Console</title>
    <link rel="stylesheet"  href="{{ asset('css/bootstrap.min.css') }}" >
    <link rel="stylesheet"  href="{{ asset('css/flexgrid.min.css') }}" >
  </head>
  <body>
   
    <div id="app"></div>
    
    @include('admin.holder')
    
    <script src="{{ mix('js/app.js') }}" ></script>
    
    
  </body>
</html>
