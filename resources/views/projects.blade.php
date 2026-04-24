@extends('layouts.app')

@section('title', 'Projects')

@section('content')
@php
    $projects = [
        [
            'tag' => 'GitHub Repository',
            'title' => 'Hamro-bhansa',
            'description' => 'Web application project from my GitHub profile.',
            'skills' => ['PHP', 'Web App'],
            'year' => '2026',
            'github_url' => 'https://github.com/Bishal10000/Hamro-bhansa',
            'demo_url' => null,
        ],
        [
            'tag' => 'GitHub Repository',
            'title' => 'Exam-hub',
            'description' => 'Exam platform project from my GitHub profile.',
            'skills' => ['PHP', 'Education'],
            'year' => '2026',
            'github_url' => 'https://github.com/Bishal10000/Exam-hub',
            'demo_url' => null,
        ],
        [
            'tag' => 'GitHub Repository',
            'title' => 'Blood-Donor-Management',
            'description' => 'A web-based platform connecting blood donors with recipients in specific regions.',
            'skills' => ['PHP', 'Laravel', 'MySQL'],
            'year' => '2026',
            'github_url' => 'https://github.com/Bishal10000/Blood-Donor-Management',
            'demo_url' => null,
        ],
        [
            'tag' => 'GitHub Repository',
            'title' => 'bishalaryal',
            'description' => 'Personal portfolio repository.',
            'skills' => ['Laravel', 'Blade', 'Tailwind CSS'],
            'year' => '2026',
            'github_url' => 'https://github.com/Bishal10000/bishalaryal',
            'demo_url' => 'https://bishal10.com.np',
        ],
        [
            'tag' => 'GitHub Repository',
            'title' => 'fundhive',
            'description' => 'Crowdfunding platform repository from my GitHub profile.',
            'skills' => ['PHP', 'Laravel', 'MySQL'],
            'year' => '2026',
            'github_url' => 'https://github.com/Bishal10000/fundhive',
            'demo_url' => null,
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
            These are the projects from my GitHub repositories, with direct links to source code and live demos where available.
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

                <div class="mt-6 flex items-center gap-4">
                    <a href="{{ $project['github_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-sm font-semibold text-teal-700 transition group-hover:text-teal-800">
                        View on GitHub
                        <span aria-hidden="true">-></span>
                    </a>

                    @if (!empty($project['demo_url']))
                        <a href="{{ $project['demo_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-700 transition group-hover:text-slate-900">
                            Live Demo
                            <span aria-hidden="true">-></span>
                        </a>
                    @else
                        <span class="text-sm font-semibold text-slate-400">Demo: Coming soon</span>
                    @endif
                </div>
            </article>
        @endforeach
    </div>
</section>
@endsection
