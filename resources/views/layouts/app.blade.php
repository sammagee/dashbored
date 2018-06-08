<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115506335-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-115506335-1');
        </script>

        <title>
            @hasSection('title')
                @yield('title') &mdash; {{ config('app.name') }}
            @else
                {{ config('app.name') }}
            @endif
        </title>

        <meta charset="utf-8">
        <meta name="description" content="Dashboard">
        <meta name="keywords" content="dashboard">
        <meta name="author" content="Sam Magee">
        <meta name="copyright" content="Sam Magee">
        <meta name="robots" content="follow">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, shrink-to-fit=no">
        <meta name="theme-color" content="#212121">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

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

        {{-- Manifest --}}
        <link rel="manifest" href="/manifest.json">
    </head>
    <body class="bg-grey-lighter h-screen font-sans text-black">
        <div id="root" class="flex flex-col h-full">
            <div class="flex flex-1">
                <div class="flex-1 h-full overflow-auto p-4">
                    @yield('content')
                </div>

                @include('flash::message')
            </div>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
