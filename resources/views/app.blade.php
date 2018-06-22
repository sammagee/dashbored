@php
$config = [
  'appName' => config('app.name'),
  'pusherKey' => env('PUSHER_APP_KEY')
];
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <title>{{ config('app.name') }}</title>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Dashboard">
    <meta name="keywords" content="dashboard">
    <meta name="author" content="Sam Magee">
    <meta name="copyright" content="Sam Magee">
    <meta name="robots" content="follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, shrink-to-fit=no">

    {{-- Icons --}}
    <link rel="icon" type="image/png" href="/favicon.png" sizes="64x64">

    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  </head>
  <body class="bg-grey-lighter font-sans text-black">
    <div id="app"></div>

    {{-- Global Configuration Object --}}
    <script>
      window.config = @json($config);
    </script>

    @if (app()->isLocal())
      <script src="{{ mix('js/app.js') }}"></script>
    @else
      <script src="{{ mix('js/manifest.js') }}"></script>
      <script src="{{ mix('js/vendor.js') }}"></script>
      <script src="{{ mix('js/app.js') }}"></script>
    @endif
  </body>
</html>
