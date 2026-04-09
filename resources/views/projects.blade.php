@extends('layouts.app')

@section('title', 'Projects')

@section('content')
@php
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
@endphp

<section class="py-8 lg:py-12 flex-1">
    <div class="flex flex-col gap-4 border-t border-slate-200 pt-8 lg:flex-row lg:items-end lg:justify-between">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-teal-700">Projects</p>
            <h1 class="mt-3 font-display text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">Selected projects</h1>
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

                <a href="/contact" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-teal-700 transition group-hover:text-teal-800">
                    Discuss this project
                    <span aria-hidden="true">-></span>
                </a>
            </article>
        @endforeach
    </div>
</section>
@endsection
