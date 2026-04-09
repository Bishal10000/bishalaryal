<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bishal Aryal</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen text-slate-900 antialiased">
        @php
            $highlights = [
                ['value' => '3+', 'label' => 'web projects shipped'],
                ['value' => 'PHP & Laravel', 'label' => 'backend expertise'],
                ['value' => 'Full Stack', 'label' => 'database to frontend'],
            ];

            $skills = [
                'PHP (Laravel)',
                'MySQL & Database Design',
                'HTML, CSS, JavaScript',
                'Bootstrap',
                'REST API Development',
                'Git & GitHub',
                'Basic Java (Android)',
                'UI/UX Design Basics',
            ];

            $profilePhotoPath = 'images/bishal.jpg';
            $profilePhotoExists = file_exists(public_path($profilePhotoPath));

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

            $projects = [
                [
                    'tag' => 'Featured',
                    'title' => 'FundHive',
                    'description' => 'A web-based crowdfunding platform enabling users to create fundraising campaigns and receive donations securely. Features community support, user dashboards, campaign management, and payment integration.',
                    'skills' => ['PHP', 'Laravel', 'MySQL', 'Payment API'],
                    'year' => '2025',
                ],
                [
                    'tag' => 'Web App',
                    'title' => 'Blood Bank Management System',
                    'description' => 'Web-based system for managing donors, receivers, and blood inventory. Streamlines donation tracking and availability checks for blood banks.',
                    'skills' => ['PHP', 'Database Design', 'MySQL', 'Bootstrap'],
                    'year' => '2024',
                ],
                [
                    'tag' => 'Mobile',
                    'title' => 'Employee Android App',
                    'description' => 'Native Android application for employee data input and display. Built with Java, demonstrating mobile development fundamentals.',
                    'skills' => ['Java', 'Android', 'Data Handling'],
                    'year' => '2023',
                ],
            ];

            $process = [
                'Requirement Analysis — Understand the problem and define clear project goals.',
                'System Design — Plan architecture, database schema, and API structure.',
                'Development — Build backend with Laravel, frontend with HTML/CSS/JS.',
                'Testing — Validate functionality, security, and performance.',
                'Deployment & Maintenance — Launch and provide ongoing support.',
            ];
        @endphp

        <div class="fixed inset-0 -z-10 overflow-hidden bg-[#f8fafc]">
            <div class="absolute -left-24 top-24 h-72 w-72 rounded-full bg-teal-100/70 blur-3xl"></div>
            <div class="absolute right-8 top-20 h-64 w-64 rounded-full bg-sky-100/70 blur-3xl"></div>
        </div>

        <main class="mx-auto flex min-h-screen w-full max-w-7xl flex-col px-6 py-6 lg:px-10">
            <header class="flex items-center justify-between gap-6 border-b border-slate-200/80 py-5">
                <div>
                    <p class="font-display text-3xl font-bold tracking-tight text-slate-900">Bishal Aryal</p>
                    <p class="text-sm text-slate-500">Web Developer</p>
                </div>

                <nav class="hidden items-center gap-2 text-sm text-slate-600 md:flex">
                    <a href="#home" class="rounded-full px-4 py-2 font-semibold transition hover:bg-slate-100 hover:text-slate-900">Home</a>
                    <a href="#about" class="rounded-full px-4 py-2 font-semibold transition hover:bg-slate-100 hover:text-slate-900">About</a>
                    <a href="#projects" class="rounded-full px-4 py-2 font-semibold transition hover:bg-slate-100 hover:text-slate-900">Projects</a>
                    <a href="#skills" class="rounded-full px-4 py-2 font-semibold transition hover:bg-slate-100 hover:text-slate-900">Skills</a>
                    <a href="#contact" class="rounded-full px-4 py-2 font-semibold transition hover:bg-slate-100 hover:text-slate-900">Contact</a>
                </nav>
            </header>

            <section id="home" class="grid flex-1 items-center gap-10 py-14 lg:grid-cols-[1.15fr_0.85fr]">
                <div class="rounded-[2rem] border border-slate-200 bg-white/90 p-8 shadow-[0_20px_60px_rgba(15,23,42,0.08)] backdrop-blur">
                    <p class="text-lg text-slate-500">Hello, I&#039;m</p>

                    <h1 class="mt-3 font-display text-6xl font-bold tracking-tight text-slate-900 sm:text-7xl">
                        Bishal Aryal
                    </h1>

                    <h2 class="mt-5 max-w-3xl font-display text-3xl font-semibold leading-tight text-teal-700 sm:text-4xl">
                        Full-Stack Web Developer
                    </h2>

                    <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-600">
                        Building production-ready web applications with PHP and Laravel. Specialized in robust database design, secure APIs, and scalable web architecture. Transforming business ideas into reliable platforms that drive real results.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="#projects" class="inline-flex items-center justify-center rounded-lg bg-teal-600 px-7 py-3 text-base font-semibold text-white shadow-[0_8px_20px_rgba(13,148,136,0.28)] transition hover:-translate-y-0.5 hover:bg-teal-700">
                            View My Work
                        </a>
                        <a href="#contact" class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-7 py-3 text-base font-semibold text-slate-700 transition hover:-translate-y-0.5 hover:border-teal-500 hover:text-teal-700">
                            Get In Touch
                        </a>
                    </div>

                    <div class="mt-8 flex items-center gap-3 text-slate-500">
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
                    <div class="rounded-[2rem] border border-slate-200 bg-white p-3 shadow-[0_20px_60px_rgba(15,23,42,0.1)]">
                        <div class="h-[420px] w-[360px] overflow-hidden rounded-[1.5rem] bg-slate-200">
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

            <section id="about" class="grid gap-5 py-8 lg:grid-cols-[1fr_1fr]">
                <div class="rounded-[1.75rem] border border-slate-200 bg-white p-7 shadow-[0_14px_45px_rgba(15,23,42,0.06)]">
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-teal-700">About</p>
                    <h2 class="mt-3 font-display text-3xl font-semibold tracking-tight text-slate-900">Building web solutions that scale and perform.</h2>
                    <p class="mt-4 text-base leading-7 text-slate-600">
                        I specialize in full-stack web development with a focus on backend architecture and database design. Whether building crowdfunding platforms, management systems, or custom web applications, I deliver production-ready code designed for reliability and maintainability.
                    </p>

                    <div class="mt-6 grid grid-cols-3 gap-3">
                        @foreach ($highlights as $highlight)
                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 text-center">
                                <p class="font-display text-lg font-semibold text-slate-900">{{ $highlight['value'] }}</p>
                                <p class="mt-1 text-xs text-slate-500">{{ $highlight['label'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div id="skills" class="rounded-[1.75rem] border border-slate-200 bg-white p-7 shadow-[0_14px_45px_rgba(15,23,42,0.06)]">
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-teal-700">Skills</p>
                    <h3 class="mt-3 font-display text-2xl font-semibold tracking-tight text-slate-900">Tools and strengths</h3>
                    <div class="mt-5 flex flex-wrap gap-2">
                        @foreach ($skills as $skill)
                            <span class="rounded-full border border-teal-100 bg-teal-50 px-3 py-1 text-xs font-semibold text-teal-800">
                                {{ $skill }}
                            </span>
                        @endforeach
                    </div>
                    <p class="mt-5 text-base leading-7 text-slate-600">
                        My stack focuses on PHP/Laravel for backend, MySQL for databases, and modern frontend technologies. I'm also familiar with Java for Android development and continuously learning new tools.
                    </p>
                </div>
            </section>

            <section id="projects" class="py-8 lg:py-12">
                <div class="flex flex-col gap-4 border-t border-slate-200 pt-8 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-teal-700">Projects</p>
                        <h2 class="mt-3 font-display text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">Selected projects</h2>
                    </div>
                    <p class="max-w-2xl text-base leading-7 text-slate-600">
                        From crowdfunding platforms to management systems, these projects showcase my ability to build secure, scalable web applications.
                    </p>
                </div>

                <div class="mt-8 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($projects as $project)
                        <article class="group rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-[0_12px_35px_rgba(15,23,42,0.05)] transition hover:-translate-y-1 hover:shadow-[0_18px_48px_rgba(15,23,42,0.12)]">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-teal-700">{{ $project['tag'] }}</p>
                                    <h3 class="mt-3 font-display text-2xl font-semibold tracking-tight text-slate-900">{{ $project['title'] }}</h3>
                                </div>

                                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                    {{ $project['year'] }}
                                </span>
                            </div>

                            <p class="mt-4 text-base leading-7 text-slate-600">{{ $project['description'] }}</p>

                            <div class="mt-6 flex flex-wrap gap-2">
                                @foreach ($project['skills'] as $skill)
                                    <span class="rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-semibold text-slate-700">
                                        {{ $skill }}
                                    </span>
                                @endforeach
                            </div>

                            <a href="#contact" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-teal-700 transition group-hover:text-teal-800">
                                Discuss this project
                                <span aria-hidden="true">-></span>
                            </a>
                        </article>
                    @endforeach
                </div>
            </section>

            <section id="process" class="grid gap-5 py-8 lg:grid-cols-[0.85fr_1.15fr]">
                <div class="rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-[0_14px_40px_rgba(15,23,42,0.06)]">
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-teal-700">Process</p>
                    <h2 class="mt-3 font-display text-3xl font-semibold tracking-tight text-slate-900">How I build web applications</h2>
                    <p class="mt-4 text-base leading-7 text-slate-600">
                        From requirements gathering to deployment and maintenance, this structured approach ensures every project is delivered on time and ready for production.
                    </p>
                </div>

                <div class="rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-[0_14px_40px_rgba(15,23,42,0.06)]">
                    <ol class="space-y-4">
                        @foreach ($process as $index => $step)
                            <li class="flex gap-4 rounded-2xl border border-slate-200 bg-slate-50 p-4">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-teal-600 text-sm font-semibold text-white">
                                    {{ $index + 1 }}
                                </span>
                                <p class="pt-1 text-base leading-7 text-slate-700">{{ $step }}</p>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </section>

            <section id="contact" class="pb-6 pt-8">
                <div class="rounded-[2rem] border border-teal-200 bg-gradient-to-r from-teal-600 to-cyan-600 px-6 py-8 text-white shadow-[0_24px_70px_rgba(13,148,136,0.25)] lg:px-8 lg:py-10">
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-teal-100">Contact</p>
                            <h2 class="mt-3 font-display text-3xl font-semibold tracking-tight">Have a web project in mind?</h2>
                            <p class="mt-4 max-w-2xl text-base leading-7 text-teal-50">
                                Whether you need a crowdfunding platform, management system, or custom web application, let's discuss your requirements and build something reliable.
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <a href="mailto:bishalaryal975@gmail.com" class="inline-flex items-center justify-center rounded-lg bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:bg-slate-100">
                                Get in touch
                            </a>
                            <a href="#projects" class="inline-flex items-center justify-center rounded-lg border border-white/50 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                                See projects
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="border-t border-slate-200 py-6 text-sm text-slate-600">
                <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                    <p>Bishal Aryal. Web Developer & Database Architect.</p>
                    <p>Built with Laravel, Blade, and Tailwind CSS.</p>
                </div>
            </footer>
        </main>
    </body>
</html>
