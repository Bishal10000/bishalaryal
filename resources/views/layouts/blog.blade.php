<!doctype html>
<html lang="en" class="dark" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#0a0a0a">

        <title>@yield('title', config('app.name')) - Bishal Aryal</title>
        <meta name="description" content="@yield('meta_description', 'A premium editorial blog built with Laravel, Blade, and motion-first design.')">
        <meta property="og:title" content="@yield('og_title', trim($__env->yieldContent('title', config('app.name'))))">
        <meta property="og:description" content="@yield('og_description', trim($__env->yieldContent('meta_description', 'A premium editorial blog built with Laravel, Blade, and motion-first design.')))">
        <meta property="og:type" content="article">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="@yield('og_image', 'https://picsum.photos/seed/bishal-og-default/1200/630')">
        <meta property="og:image:alt" content="@yield('og_image_alt', trim($__env->yieldContent('title', config('app.name'))))">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:image" content="@yield('og_image', 'https://picsum.photos/seed/bishal-og-default/1200/630')">
        <link rel="alternate" type="application/rss+xml" title="{{ config('app.name') }} RSS" href="{{ route('blog.feed') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('meta')
    </head>
    <body class="overflow-x-hidden antialiased @yield('body_class', '')">
        <div data-reading-progress class="reading-progress"></div>
        <div data-custom-cursor-ring class="cursor-ring hidden lg:block"></div>
        <div data-custom-cursor class="cursor-dot hidden lg:block"></div>

        <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
            <div data-parallax data-speed="0.05" class="hero-orb left-[-8rem] top-24 h-72 w-72 bg-[#c8622a]/18"></div>
            <div data-parallax data-speed="0.09" class="hero-orb right-[-4rem] top-36 h-96 w-96 bg-[#f5f0e8]/8"></div>
        </div>

        @include('partials.navigation')

        <main class="relative z-10 mx-auto min-h-screen w-full max-w-[1500px] px-4 pb-16 pt-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>

        @include('partials.footer')

        @stack('scripts')
    </body>
</html>

