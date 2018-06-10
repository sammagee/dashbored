@php
$config = [
  'appName' => config('app.name')
];
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <title>{{ config('app.name') }}</title>

    <meta charset="utf-8">
    <meta name="description" content="Dashboard">
    <meta name="keywords" content="dashboard">
    <meta name="author" content="Sam Magee">
    <meta name="copyright" content="Sam Magee">
    <meta name="robots" content="follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, shrink-to-fit=no">
    <meta name="theme-color" content="#212121">

    {{-- Icons --}}
    <link rel="icon" type="image/png" href="/favicon.png" sizes="64x64">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/touch/apple-touch-icon-76.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="/images/touch/apple-touch-icon-120.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="/images/touch/apple-touch-icon-152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="/images/touch/apple-touch-icon-180.png" />
    <link rel="shortcut icon" sizes="196x196" href="/images/touch/android-icon.png">
    <meta name="msapplication-square70x70logo" content="/images/touch/smalltile.png" />
    <meta name="msapplication-square150x150logo" content="/images/touch/mediumtile.png" />
    <meta name="msapplication-wide310x150logo" content="/images/touch/widetile.png" />
    <meta name="msapplication-square310x310logo" content="/images/touch/largetile.png" />

    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  </head>
  <body class="bg-grey-lighter h-screen font-sans text-black">
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
