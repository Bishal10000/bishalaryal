@extends('layouts.app')

@section('title', 'RSS Feed')
@section('meta_description', 'Subscribe to the editorial RSS feed or copy the feed URL for your reader.')

@section('content')
<section class="pt-6">
    <div class="glass-card rounded-[2.5rem] px-6 py-10 sm:px-10 sm:py-12">
        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-500">RSS / Atom</p>
        <h1 class="mt-3 font-display text-4xl font-semibold text-slate-950 dark:text-white sm:text-6xl">Subscribe to the feed</h1>
        <p class="mt-4 max-w-3xl text-base leading-8 text-slate-600 dark:text-slate-300">
            Feed readers should use the XML endpoint, while this page stays human-friendly and gives you quick access to the URL.
        </p>

        <div class="mt-8 grid gap-4 lg:grid-cols-[1fr_auto] lg:items-center">
            <input id="feed-url" type="text" readonly value="{{ $feedUrl }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 outline-none dark:border-white/10 dark:bg-slate-950 dark:text-white">
            <div class="flex flex-wrap gap-3">
                <button type="button" onclick="navigator.clipboard.writeText(document.getElementById('feed-url').value)" class="rounded-full bg-slate-950 px-5 py-3 text-sm font-semibold text-white hover:-translate-y-0.5 hover:bg-amber-500 hover:text-slate-950">
                    Copy feed URL
                </button>
                <a href="{{ $feedUrl }}" class="rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:-translate-y-0.5 hover:border-amber-400 hover:text-slate-950 dark:border-white/10 dark:bg-slate-900 dark:text-slate-200 dark:hover:text-white">
                    Open XML feed
                </a>
            </div>
        </div>
    </div>
</section>
@endsection