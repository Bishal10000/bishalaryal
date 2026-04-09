@extends('layouts.app')

@section('title', 'Process')

@section('content')
@php
    $process = [
        [
            'title' => 'Requirement Analysis',
            'description' => 'Understand the problem and define clear project goals with stakeholders.',
        ],
        [
            'title' => 'System Design',
            'description' => 'Plan architecture, database schema, and API structure.',
        ],
        [
            'title' => 'Development',
            'description' => 'Build backend with Laravel, frontend with HTML/CSS/JS.',
        ],
        [
            'title' => 'Testing',
            'description' => 'Validate functionality, security, and performance.',
        ],
        [
            'title' => 'Deployment & Maintenance',
            'description' => 'Launch and provide ongoing support.',
        ],
    ];
@endphp

<section class="py-8 flex-1">
    <div class="grid gap-8 lg:grid-cols-[0.85fr_1.15fr] mb-8">
        <div class="rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-[0_14px_40px_rgba(15,23,42,0.06)]">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-teal-700">Process</p>
            <h1 class="mt-3 font-display text-3xl font-semibold tracking-tight text-slate-900">How I build web applications</h1>
            <p class="mt-4 text-base leading-7 text-slate-600">
                From requirements gathering to deployment and maintenance, this structured approach ensures every project is delivered on time and ready for production.
            </p>
        </div>
    </div>

    <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($process as $index => $step)
            <div class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-[0_12px_35px_rgba(15,23,42,0.05)]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-teal-600 text-lg font-bold text-white">
                    {{ $index + 1 }}
                </div>
                <h3 class="mt-4 font-display text-xl font-semibold text-slate-900">{{ $step['title'] }}</h3>
                <p class="mt-2 text-base leading-6 text-slate-600">{{ $step['description'] }}</p>
            </div>
        @endforeach
    </div>
</section>
@endsection
