@extends('layouts.app')

@section('title', 'Home')

@section('content')
@php
    $socialLinks = [
        [
            'label' => 'GitHub',
            'href' => 'https://github.com/Bishal10000',
            'icon' => 'github',
        ],
        [
            'label' => 'LinkedIn',
            'href' => '#',
            'icon' => 'linkedin',
        ],
        [
            'label' => 'Stack Overflow',
            'href' => '#',
            'icon' => 'stackoverflow',
        ],
        [
            'label' => 'Email',
            'href' => 'mailto:bishalaryal975@gmail.com',
            'icon' => 'mail',
        ],
    ];

    $profilePhotoPath = 'images/bishal.jpg';
    $profilePhotoExists = file_exists(public_path($profilePhotoPath));
@endphp

<section id="home" class="grid flex-1 items-center gap-8 py-8 sm:gap-10 sm:py-14 lg:grid-cols-[1.15fr_0.85fr]">
    <div class="rounded-[2rem] border border-slate-200 bg-white/90 p-5 shadow-[0_20px_60px_rgba(15,23,42,0.08)] backdrop-blur sm:p-8">
        <p class="text-lg text-slate-500">Hello, I'm</p>

        <h1 class="mt-3 font-display text-5xl font-bold tracking-tight text-slate-900 sm:text-7xl">
            Bishal Aryal
        </h1>

        <h2 class="mt-5 max-w-3xl font-display text-2xl font-semibold leading-tight text-teal-700 sm:text-4xl">
            Full-Stack Web Developer
        </h2>

        <p class="mt-6 max-w-3xl text-base leading-7 text-slate-600 sm:text-lg sm:leading-8">
            Building production-ready web applications with PHP and Laravel. Specialized in robust database design, secure APIs, and scalable web architecture. Transforming business ideas into reliable platforms that drive real results.
        </p>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
            <a href="/projects" class="inline-flex w-full items-center justify-center rounded-lg bg-teal-600 px-7 py-3 text-base font-semibold text-white shadow-[0_8px_20px_rgba(13,148,136,0.28)] transition hover:-translate-y-0.5 hover:bg-teal-700 sm:w-auto">
                View My Work
            </a>
            <a href="/contact" class="inline-flex w-full items-center justify-center rounded-lg border border-slate-300 bg-white px-7 py-3 text-base font-semibold text-slate-700 transition hover:-translate-y-0.5 hover:border-teal-500 hover:text-teal-700 sm:w-auto">
                Get In Touch
            </a>
        </div>

        <div class="mt-8 flex flex-wrap items-center gap-3 text-slate-500">
            @foreach ($socialLinks as $social)
                <a href="{{ $social['href'] }}" aria-label="{{ $social['label'] }}" class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white transition hover:border-teal-500 hover:text-teal-700">
                    @if ($social['icon'] === 'github')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .5A12 12 0 0 0 8.2 23.9c.6.1.8-.2.8-.6v-2c-3.3.7-4-1.4-4-1.4-.5-1.3-1.2-1.6-1.2-1.6-1-.7.1-.7.1-.7 1.1.1 1.8 1.1 1.8 1.1 1 .1.6 2.6 3.4 2.2.1-.7.4-1.2.7-1.5-2.7-.3-5.5-1.3-5.5-5.8 0-1.3.5-2.3 1.2-3.1-.1-.3-.5-1.6.1-3.3 0 0 1-.3 3.2 1.2a11 11 0 0 1 5.8 0C17 5 18 5.3 18 5.3c.6 1.7.2 3 .1 3.3.8.8 1.2 1.8 1.2 3.1 0 4.6-2.8 5.5-5.5 5.8.4.3.8 1 .8 2.1v3.1c0 .3.2.7.8.6A12 12 0 0 0 12 .5Z"/></svg>
                    @elseif ($social['icon'] === 'linkedin')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5ZM3 9h4v12H3V9Zm7 0h3.8v1.7h.1c.5-1 1.8-2.1 3.8-2.1 4 0 4.7 2.6 4.7 6V21h-4v-5.7c0-1.4 0-3.1-1.9-3.1s-2.2 1.5-2.2 3V21h-4V9Z"/></svg>
                    @elseif ($social['icon'] === 'stackoverflow')
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="m17.2 20.6-10.4.1.1-3h-2.2l-.1 5.1h14.9v-5h-2.2l-.1 2.8Zm-8.8-5.3 8.6 1.8.5-2.1-8.7-1.8-.4 2.1Zm1.1-4.1 8-3.7-.9-2-8 3.7.9 2Zm2.2-3.9 6.8-5.7-1.4-1.7-6.8 5.8 1.4 1.6Z"/></svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M2 5h20v14H2V5Zm2 2v.3l8 5.3 8-5.3V7H4Zm16 10V9.7l-8 5.3-8-5.3V17h16Z"/></svg>
                    @endif
                </a>
            @endforeach
        </div>
    </div>

    <div class="relative flex justify-center lg:justify-end">
        <div class="absolute -left-5 top-4 h-20 w-20 rounded-2xl bg-amber-200/70 blur-xl"></div>
        <div class="w-full max-w-[380px] rounded-[2rem] border border-slate-200 bg-white p-3 shadow-[0_20px_60px_rgba(15,23,42,0.1)]">
            <div class="h-[340px] w-full overflow-hidden rounded-[1.5rem] bg-slate-200 sm:h-[420px]">
                @if ($profilePhotoExists)
                    <img
                        src="{{ asset($profilePhotoPath) }}"
                        alt="Bishal Aryal profile photo"
                        class="h-full w-full object-cover"
                    />
                @else
                    <div class="flex h-full w-full items-center justify-center px-8 text-center text-slate-600">
                        Add your photo at public/images/bishal.jpg
                    </div>
                @endif
            </div>
            <div class="mt-3 rounded-xl bg-slate-50 px-4 py-3">
                <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500">Currently Building</p>
                <p class="mt-2 text-sm font-semibold text-slate-800">Web Platforms with Laravel & MySQL</p>
            </div>
        </div>
    </div>
</section>
@endsection
