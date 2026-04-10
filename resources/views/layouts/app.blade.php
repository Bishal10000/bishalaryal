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

        <main class="mx-auto flex min-h-screen w-full max-w-7xl flex-col px-6 py-6 lg:px-10">
            <header class="flex items-center justify-between gap-6 border-b border-slate-200/80 py-5">
                <div>
                    <a href="/" class="font-display text-3xl font-bold tracking-tight text-slate-900 hover:text-teal-700 transition">Bishal Aryal</a>
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
            </header>

            @yield('content')

            <footer class="border-t border-slate-200 py-6 text-sm text-slate-600 mt-auto">
                <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                    <p>Bishal Aryal. Web Developer & Database Architect.</p>
                    <p>Built with Laravel, Blade, and Tailwind CSS.</p>
                </div>
            </footer>
        </main>
    </body>
</html>
