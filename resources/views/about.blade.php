@extends('layouts.app')

@section('title', 'About')

@section('content')
<section class="grid flex-1 gap-5 py-8 lg:grid-cols-[1fr_1fr]">
    <div class="rounded-[1.75rem] border border-slate-200 bg-white p-7 shadow-[0_14px_45px_rgba(15,23,42,0.06)]">
        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-teal-700">About</p>
        <h1 class="mt-3 font-display text-3xl font-semibold tracking-tight text-slate-900">Building web solutions that scale and perform.</h1>
        <p class="mt-4 text-base leading-7 text-slate-600">
            I specialize in full-stack web development with a focus on backend architecture and database design. Whether building crowdfunding platforms, management systems, or custom web applications, I deliver production-ready code designed for reliability and maintainability.
        </p>

        <div class="mt-6 grid grid-cols-3 gap-3">
            <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 text-center">
                <p class="font-display text-lg font-semibold text-slate-900">3+</p>
                <p class="mt-1 text-xs text-slate-500">web projects shipped</p>
            </div>
            <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 text-center">
                <p class="font-display text-lg font-semibold text-slate-900">PHP & Laravel</p>
                <p class="mt-1 text-xs text-slate-500">backend expertise</p>
            </div>
            <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 text-center">
                <p class="font-display text-lg font-semibold text-slate-900">Full Stack</p>
                <p class="mt-1 text-xs text-slate-500">database to frontend</p>
            </div>
        </div>
    </div>

    <div class="rounded-[1.75rem] border border-slate-200 bg-white p-7 shadow-[0_14px_45px_rgba(15,23,42,0.06)]">
        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-teal-700">Experience</p>
        <h3 class="mt-3 font-display text-2xl font-semibold tracking-tight text-slate-900">Tools and strengths</h3>
        <div class="mt-5 flex flex-wrap gap-2">
            @php
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
            @endphp
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
@endsection
