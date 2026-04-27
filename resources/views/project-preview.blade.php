@extends('layouts.app')

@section('title', $project['title'] . ' Demo')

@section('content')
<section class="py-8 lg:py-12 flex-1">
    <div class="flex items-center justify-between gap-4 border-t border-slate-200 pt-8">
        <a href="/projects" class="inline-flex items-center gap-2 rounded-lg bg-indigo-700 px-4 py-2 text-sm font-semibold text-white transition hover:bg-indigo-800">
            <- Back to Projects
        </a>

        <a href="{{ $project['github_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-lg bg-rose-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-rose-700">
            Open Github
        </a>
    </div>

    <div class="mt-8 grid gap-8 lg:grid-cols-[1.2fr_1fr]">
        <article class="rounded-[1.5rem] border border-slate-200 bg-white p-6 shadow-[0_12px_35px_rgba(15,23,42,0.05)]">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-teal-700">Project Live Preview</p>
            <h1 class="mt-3 font-display text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">{{ $project['title'] }}</h1>
            <p class="mt-4 text-base leading-7 text-slate-600">{{ $project['description'] }}</p>

            <div class="mt-6 flex flex-wrap gap-2">
                @foreach ($project['stack'] as $item)
                    <span class="rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-semibold text-slate-700">
                        {{ $item }}
                    </span>
                @endforeach
            </div>

            <div class="mt-8 rounded-2xl border border-slate-200 bg-slate-50 p-4">
                <p class="text-sm text-slate-600">
                    This page is your live project showcase on your portfolio. It gives visitors a direct place to view the project details even when GitHub Pages is not deployed yet.
                </p>
            </div>
        </article>

        <aside class="rounded-[1.5rem] border border-slate-200 bg-white p-5 shadow-[0_12px_35px_rgba(15,23,42,0.05)]">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">Repository Snapshot</p>

            <img
                src="https://opengraph.githubassets.com/1/Bishal10000/{{ $project['title'] }}"
                alt="{{ $project['title'] }} repository preview"
                class="mt-4 w-full rounded-xl border border-slate-200 object-cover"
                loading="lazy"
            />

            <div class="mt-5 flex flex-col gap-3">
                <a href="{{ $project['github_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-800">
                    View Repository
                </a>

                @if (!empty($project['external_live_url']))
                    <a href="{{ $project['external_live_url'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-lg bg-indigo-700 px-4 py-2 text-sm font-semibold text-white transition hover:bg-indigo-800">
                        Open External Live Site
                    </a>
                @endif
            </div>
        </aside>
    </div>
</section>
@endsection
