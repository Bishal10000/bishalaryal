@extends('layouts.app')

@section('title', $title)
@section('meta_description', $subtitle)

@section('content')
<section class="pt-6">
    <div class="glass-card rounded-[2.5rem] px-6 py-10 sm:px-10 sm:py-12">
        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-500">{{ ucfirst($kind) }} archive</p>
        <h1 class="mt-3 font-display text-4xl font-semibold text-slate-950 dark:text-white sm:text-6xl">{{ $title }}</h1>
        <p class="mt-4 max-w-3xl text-base leading-8 text-slate-600 dark:text-slate-300">{{ $subtitle }}</p>
    </div>
</section>

<section class="mt-10">
    <div class="masonry-grid">
        @foreach ($posts as $post)
            @include('partials.post-card', ['post' => $post])
        @endforeach
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</section>
@endsection