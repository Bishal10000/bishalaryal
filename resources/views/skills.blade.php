@extends('layouts.app')

@section('title', 'Skills')

@section('content')
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

<section class="py-8 flex-1">
    <div class="rounded-[1.75rem] border border-slate-200 bg-white p-7 shadow-[0_14px_45px_rgba(15,23,42,0.06)]">
        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-teal-700">Skills</p>
        <h1 class="mt-3 font-display text-4xl font-semibold tracking-tight text-slate-900">Tools and strengths</h1>
        
        <p class="mt-6 text-base leading-7 text-slate-600 max-w-3xl">
            My stack focuses on PHP/Laravel for backend, MySQL for databases, and modern frontend technologies. I'm also familiar with Java for Android development and continuously learning new tools to stay current with industry standards.
        </p>

        <div class="mt-8 flex flex-wrap gap-3">
            @foreach ($skills as $skill)
                <span class="rounded-full border border-teal-100 bg-teal-50 px-4 py-2 text-base font-semibold text-teal-800 shadow-sm">
                    {{ $skill }}
                </span>
            @endforeach
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2">
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                <h3 class="font-display text-xl font-semibold text-slate-900">Backend</h3>
                <p class="mt-2 text-base text-slate-600">PHP with Laravel framework, MySQL database design and optimization, RESTful API development.</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                <h3 class="font-display text-xl font-semibold text-slate-900">Frontend</h3>
                <p class="mt-2 text-base text-slate-600">HTML, CSS, JavaScript, Bootstrap framework, responsive design, and user interface principles.</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                <h3 class="font-display text-xl font-semibold text-slate-900">Database</h3>
                <p class="mt-2 text-base text-slate-600">MySQL database design, schema optimization, data management, and performance tuning.</p>
            </div>
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">
                <h3 class="font-display text-xl font-semibold text-slate-900">Mobile</h3>
                <p class="mt-2 text-base text-slate-600">Basic Java for Android, native app development, and mobile-first design principles.</p>
            </div>
        </div>
    </div>
</section>
@endsection
