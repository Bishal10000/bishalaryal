@extends('layouts.app')

@section('title', 'Bishal Aryal Journal')
@section('meta_description', 'A premium editorial blog with immersive typography, dark luxury styling, and thoughtful stories from Bishal Aryal.')

@section('content')
@php
    $topics = $categories->take(6);
    $authorAvatar = asset('images/bishal.jpg');
    $authorName = $author?->name ?? 'Bishal Aryal';
    $authorRole = $author?->role ?? 'Editor and storyteller';
    $authorBio = $author?->bio ?? 'Crafting editorial-grade Laravel experiences with premium UI, sharp writing, and thoughtful motion.';
    $heroStats = [
        ['label' => 'Readers monthly', 'value' => '12k+'],
        ['label' => 'Published stories', 'value' => $latestPosts->count() + ($featuredPost ? 1 : 0)],
        ['label' => 'Topics covered', 'value' => $categories->count()],
    ];
    $featuredTeaserPosts = $latestPosts->take(3);
@endphp

<section class="grid gap-8 pt-4 lg:grid-cols-[1.14fr_0.86fr]">
    <div class="hero-gradient rounded-[2.5rem] px-6 py-10 sm:px-10 sm:py-14 lg:px-12 lg:py-16">
        <div data-parallax data-speed="0.08" class="hero-orb left-6 top-10 h-32 w-32 bg-white/12"></div>
        <div data-parallax data-speed="0.12" class="hero-orb right-4 top-16 h-40 w-40 bg-[#c8622a]/20"></div>

        <div class="relative z-10 max-w-3xl space-y-6">
            <p data-reveal class="fade-in inline-flex rounded-full border border-white/10 bg-white/5 px-4 py-2 text-xs font-semibold uppercase tracking-[0.34em] text-[#f5f0e8]/85 backdrop-blur">
                Editorial blog / design / essays / motion
            </p>

            <h1 data-reveal class="fade-in max-w-4xl font-display text-5xl font-semibold leading-[0.94] tracking-tight text-[#f5f0e8] sm:text-7xl lg:text-[5.7rem]">
                Words that move the world
            </h1>

            <p data-reveal class="fade-in max-w-2xl text-lg leading-8 text-[#f5f0e8]/78 sm:text-xl">
                A premium magazine-style blog where essays, technical notes, and visual stories meet in a dark, cinematic reading experience.
            </p>

            <div data-reveal class="fade-in flex flex-wrap gap-3">
                <a href="#articles" class="inline-flex items-center justify-center rounded-full bg-[#f5f0e8] px-6 py-3 text-sm font-semibold text-[#0a0a0a] shadow-[0_18px_40px_rgba(0,0,0,0.25)] hover:-translate-y-0.5 hover:bg-[#fff7ec]">
                    Read latest issue
                </a>
                <a href="#newsletter" class="inline-flex items-center justify-center rounded-full border border-white/12 bg-white/5 px-6 py-3 text-sm font-semibold text-[#f5f0e8] backdrop-blur hover:-translate-y-0.5 hover:bg-white/10">
                    Join the newsletter
                </a>
            </div>

            <div class="grid gap-3 sm:grid-cols-3">
                @foreach ($heroStats as $stat)
                    <div data-reveal class="fade-in rounded-3xl border border-white/10 bg-white/5 p-4 backdrop-blur">
                        <p class="text-xs uppercase tracking-[0.32em] text-[#b8ab9b]">{{ $stat['label'] }}</p>
                        <p class="mt-2 font-display text-3xl font-semibold text-[#fff7ec]">{{ $stat['value'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="space-y-6">
        @if ($featuredPost)
            <article data-reveal class="fade-in glass-card overflow-hidden rounded-[2.25rem]">
                <a href="{{ route('posts.show', $featuredPost) }}" class="block">
                    <div class="relative aspect-[4/3] overflow-hidden">
                        <img src="{{ $featuredPost->thumbnailUrl() }}" alt="{{ $featuredPost->title }}" class="h-full w-full object-cover transition duration-700 hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#050505]/88 via-[#050505]/20 to-transparent"></div>
                        <div class="absolute left-5 top-5 rounded-full bg-[#c8622a] px-3 py-1 text-xs font-semibold uppercase tracking-[0.24em] text-[#0a0a0a] shadow-sm">Featured post</div>
                    </div>
                    <div class="space-y-4 p-6 sm:p-7">
                        <div class="flex items-center gap-3 text-xs font-semibold uppercase tracking-[0.24em] text-[#b8ab9b]">
                            <span>{{ $featuredPost->category?->name ?? 'Story' }}</span>
                            <span>•</span>
                            <span>{{ $featuredPost->readingTimeMinutes() }} min read</span>
                        </div>
                        <h2 class="font-display text-3xl font-semibold leading-tight text-[#fff7ec] sm:text-4xl">{{ $featuredPost->title }}</h2>
                        <p class="text-sm leading-7 text-[#d9cfc1]">{{ $featuredPost->teaser() }}</p>
                        <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 p-3">
                            <img src="{{ $authorAvatar }}" alt="{{ $featuredPost->author?->name ?? $authorName }}" class="h-11 w-11 rounded-full object-cover">
                            <div>
                                <p class="text-sm font-semibold text-[#fff7ec]">{{ $featuredPost->author?->name ?? $authorName }}</p>
                                <p class="text-xs text-[#b8ab9b]">{{ $featuredPost->published_at?->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
        @endif

        <div data-reveal class="fade-in glass-card rounded-[2rem] p-6">
            <p class="text-xs font-semibold uppercase tracking-[0.34em] text-[#f0a85a]">Today’s issue</p>
            <div class="mt-5 grid gap-4">
                @foreach ($featuredTeaserPosts as $post)
                    <a href="{{ route('posts.show', $post) }}" class="group flex gap-4 rounded-[1.5rem] border border-white/8 bg-white/4 p-4 hover:-translate-y-0.5 hover:border-[#c8622a]/40 hover:bg-white/6">
                        <img src="{{ $post->thumbnailUrl() }}" alt="{{ $post->title }}" class="h-20 w-20 shrink-0 rounded-2xl object-cover">
                        <div class="min-w-0 flex-1">
                            <p class="text-[0.7rem] font-semibold uppercase tracking-[0.28em] text-[#f0a85a]">{{ $post->category?->name ?? 'Story' }}</p>
                            <h3 class="mt-1 font-display text-xl leading-snug text-[#fff7ec] transition group-hover:text-[#f7c58f]">{{ $post->title }}</h3>
                            <p class="mt-2 line-clamp-2 text-sm leading-6 text-[#b8ab9b]">{{ $post->teaser() }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section id="topics" class="mt-10" data-reveal>
    <div class="flex items-end justify-between gap-4">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.34em] text-[#f0a85a]">Topics</p>
            <h2 class="mt-2 font-display text-3xl font-semibold text-[#fff7ec] sm:text-4xl">Browse by mood, craft, and subject</h2>
        </div>
        <a href="{{ route('articles.index') }}" class="hidden rounded-full border border-white/10 px-4 py-2 text-sm font-semibold text-[#d9cfc1] hover:border-[#c8622a] hover:text-[#fff7ec] lg:inline-flex">All blogs</a>
    </div>

    <div class="pill-scroll mt-5">
        @foreach (['Tech', 'Design', 'Travel', 'Life', 'Code', 'Philosophy'] as $label)
            <a href="{{ route('articles.index') }}" class="topic-pill">
                <span class="text-xs uppercase tracking-[0.28em] text-[#8d8478]">Topic</span>
                <span class="font-semibold text-[#f5f0e8]">{{ $label }}</span>
            </a>
        @endforeach

        @foreach ($topics as $topic)
            <a href="{{ route('categories.show', $topic) }}" class="topic-pill">
                <span class="h-2 w-2 rounded-full" style="background: {{ $topic->color }}"></span>
                <span class="font-semibold text-[#f5f0e8]">{{ $topic->name }}</span>
            </a>
        @endforeach
    </div>
</section>

<section id="articles" class="mt-12" data-reveal>
    <div class="flex items-end justify-between gap-4">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.34em] text-[#f0a85a]">Latest blogs</p>
            <h2 class="mt-2 font-display text-3xl font-semibold text-[#fff7ec] sm:text-4xl">A masonry feed with editorial rhythm</h2>
        </div>
        <a href="{{ route('articles.index') }}" class="rounded-full border border-white/10 px-4 py-2 text-sm font-semibold text-[#d9cfc1] hover:border-[#c8622a] hover:text-[#fff7ec]">View all</a>
    </div>

    <div class="masonry-grid mt-6">
        @foreach ($latestPosts as $post)
            @include('partials.post-card', ['post' => $post])
        @endforeach
    </div>
</section>

<section id="newsletter" class="mt-12 rounded-[2.5rem] bg-[#0f1115] px-6 py-10 sm:px-10 lg:px-12" data-reveal>
    <div class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#f0a85a]">Newsletter</p>
            <h2 class="mt-4 font-display text-4xl font-semibold text-[#fff7ec] sm:text-5xl">Join 12,000 readers</h2>
            <p class="mt-4 max-w-2xl text-base leading-8 text-[#d9cfc1]">Weekly essays, behind-the-scenes notes, and new stories delivered in a calm, curated format.</p>
            <div class="mt-6 flex flex-wrap gap-3 text-xs uppercase tracking-[0.3em] text-[#8d8478]">
                <span>Weekly</span>
                <span>•</span>
                <span>Ad-free</span>
                <span>•</span>
                <span>Thoughtful</span>
            </div>
        </div>

        <form class="flex flex-col gap-3 sm:flex-row" method="POST" action="{{ route('newsletter.subscribe') }}">
            @csrf
            <input type="email" name="email" placeholder="Email address" class="flex-1 rounded-2xl border border-white/10 bg-[#090909] px-4 py-3 text-sm text-[#f5f0e8] outline-none placeholder:text-[#8d8478] focus:border-[#c8622a] focus:ring-4 focus:ring-[#c8622a]/20">
            <button class="rounded-2xl bg-[#f5f0e8] px-5 py-3 text-sm font-semibold text-[#0a0a0a] hover:-translate-y-0.5 hover:bg-[#fff7ec]">Subscribe</button>
        </form>
    </div>

    @if (session('newsletter_status'))
        <div class="mt-5 rounded-2xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-100">{{ session('newsletter_status') }}</div>
    @endif
</section>

<section id="about" class="mt-12 grid gap-8 lg:grid-cols-[0.95fr_1.05fr]" data-reveal>
    <div class="glass-card rounded-[2rem] p-6 sm:p-8">
        <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#f0a85a]">About the author</p>
        <div class="mt-6 flex flex-col gap-5 sm:flex-row sm:items-center">
            <img src="{{ $authorAvatar }}" alt="{{ $authorName }}" class="h-28 w-28 rounded-[2rem] object-cover shadow-[0_20px_50px_rgba(0,0,0,0.35)]">
            <div>
                <h3 class="font-display text-3xl font-semibold text-[#fff7ec]">{{ $authorName }}</h3>
                <p class="mt-2 text-sm uppercase tracking-[0.28em] text-[#8d8478]">{{ $authorRole }}</p>
                <p class="mt-4 max-w-xl text-sm leading-7 text-[#d9cfc1]">{{ $authorBio }}</p>
            </div>
        </div>

        <div class="mt-6 flex flex-wrap gap-3">
            <a href="{{ $author?->github_url ?? 'https://github.com/Bishal10000' }}" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-[#d9cfc1] hover:border-[#c8622a] hover:text-[#fff7ec]">GitHub</a>
            <a href="{{ $author?->linkedin_url ?? 'https://www.linkedin.com/in/bishal-aryal-829286310/' }}" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-[#d9cfc1] hover:border-[#c8622a] hover:text-[#fff7ec]">LinkedIn</a>
            <a href="{{ $author?->website_url ?? 'https://bishal10.com.np' }}" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-[#d9cfc1] hover:border-[#c8622a] hover:text-[#fff7ec]">Website</a>
        </div>
    </div>

    <div class="glass-card rounded-[2rem] p-6 sm:p-8">
        <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#f0a85a]">The reading stack</p>
        <div class="mt-5 grid gap-4 sm:grid-cols-2">
            <div class="rounded-[1.5rem] border border-white/8 bg-white/4 p-4">
                <p class="text-xs uppercase tracking-[0.28em] text-[#8d8478]">Latest issue</p>
                <p class="mt-2 font-display text-2xl text-[#fff7ec]">{{ $featuredPost?->title ?? 'A fresh editorial story every week' }}</p>
            </div>
            <div class="rounded-[1.5rem] border border-white/8 bg-white/4 p-4">
                <p class="text-xs uppercase tracking-[0.28em] text-[#8d8478]">Publishing pace</p>
                <p class="mt-2 font-display text-2xl text-[#fff7ec]">Curated, not crowded</p>
            </div>
        </div>

        <div class="mt-5 rounded-[1.5rem] border border-white/8 bg-white/4 p-5 text-sm leading-7 text-[#d9cfc1]">
            I write about the craft of digital products, the nuance of storytelling, and the small details that make a site feel unforgettable.
        </div>
    </div>
</section>
@endsection
