<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - Bishal Aryal</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen text-slate-900 antialiased">
        <div class="fixed inset-0 -z-10 overflow-hidden bg-[#f8fafc]">
            <div class="absolute -left-24 top-24 h-72 w-72 rounded-full bg-teal-100/70 blur-3xl"></div>
            <div class="absolute right-8 top-20 h-64 w-64 rounded-full bg-sky-100/70 blur-3xl"></div>
        </div>

        <main class="mx-auto flex min-h-screen w-full max-w-7xl flex-col px-4 py-4 sm:px-6 sm:py-6 lg:px-10">
            <header class="flex items-center justify-between gap-4 border-b border-slate-200/80 py-4 sm:gap-6 sm:py-5">
                <div>
                    <a href="/" class="font-display text-2xl font-bold tracking-tight text-slate-900 transition hover:text-teal-700 sm:text-3xl">Bishal Aryal</a>
                    <p class="text-sm text-slate-500">Web Developer</p>
                </div>

                <nav class="hidden items-center gap-2 text-sm text-slate-600 md:flex">
                    <a href="/" class="rounded-full px-4 py-2 font-semibold transition hover:bg-slate-100 hover:text-slate-900">Home</a>
                    <a href="/about" class="rounded-full px-4 py-2 font-semibold transition hover:bg-slate-100 hover:text-slate-900">About</a>
                    <a href="/projects" class="rounded-full px-4 py-2 font-semibold transition hover:bg-slate-100 hover:text-slate-900">Projects</a>
                    <a href="/skills" class="rounded-full px-4 py-2 font-semibold transition hover:bg-slate-100 hover:text-slate-900">Skills</a>
                    <a href="/process" class="rounded-full px-4 py-2 font-semibold transition hover:bg-slate-100 hover:text-slate-900">Process</a>
                    <a href="/contact" class="rounded-full px-4 py-2 font-semibold transition hover:bg-slate-100 hover:text-slate-900">Contact</a>
                </nav>

                <details class="relative md:hidden">
                    <summary class="flex h-10 w-10 cursor-pointer list-none items-center justify-center rounded-lg border border-slate-300 bg-white text-slate-700 transition hover:border-teal-500 hover:text-teal-700">
                        <span class="sr-only">Open navigation menu</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </summary>

                    <nav class="absolute right-0 top-12 z-20 w-52 rounded-xl border border-slate-200 bg-white p-2 shadow-lg">
                        <a href="/" class="block rounded-lg px-3 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Home</a>
                        <a href="/about" class="block rounded-lg px-3 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">About</a>
                        <a href="/projects" class="block rounded-lg px-3 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Projects</a>
                        <a href="/skills" class="block rounded-lg px-3 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Skills</a>
                        <a href="/process" class="block rounded-lg px-3 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Process</a>
                        <a href="/contact" class="block rounded-lg px-3 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">Contact</a>
                    </nav>
                </details>
            </header>

            @yield('content')

            <footer class="mt-auto border-t border-slate-200 py-6 text-sm text-slate-600">
                <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                    <p>Bishal Aryal. Web Developer & Database Architect.</p>
                    <p>Built with Laravel, Blade, and Tailwind CSS.</p>
                </div>
            </footer>
        </main>
    </body>
</html>
