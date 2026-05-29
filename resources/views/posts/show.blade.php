@extends('layouts.blog')

@section('title', $post->title)
@section('content')

@if ($isVscodePost)
<section class="article-page__header">
    <div class="site-container">
        <div class="article-page__meta fade-up">
            <span class="badge">{{ $post->category?->name ?? 'Blog' }}</span>
            <span>{{ $post->published_at?->format('M d, Y') }}</span>
            <span class="meta-dot"></span>
            <span>{{ $post->readingTimeMinutes() }} min read</span>
        </div>

        <h1 class="article-page__title fade-up">{{ $post->title }}</h1>
        <p class="lead fade-up">{{ $post->excerpt }}</p>
    </div>
</section>

<section class="article-page__body">
    <div class="article-page__reading-column">
        <div class="fade-up overflow-hidden rounded-[2rem] border border-slate-200 bg-white dark:border-white/10 dark:bg-slate-950/60">
            <iframe
                src="{{ route('articles.vscode-extensions.carousel') }}"
                title="VS Code Extensions Carousel"
                class="block h-[1100px] w-full border-0 bg-white"
                loading="lazy"
            ></iframe>
        </div>
    </div>

    <aside class="space-y-5 lg:sticky lg:top-24 lg:self-start">
        <div class="glass-card rounded-[2rem] p-5">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-500">Blog meta</p>
            <dl class="mt-5 grid gap-4 text-sm">
                <div class="flex items-center justify-between gap-4 rounded-2xl border border-slate-200/70 bg-white/70 px-4 py-3 dark:border-white/10 dark:bg-slate-950/60">
                    <dt class="text-slate-500">Reading time</dt>
                    <dd class="font-semibold text-slate-950 dark:text-white">{{ $post->readingTimeMinutes() }} min</dd>
                </div>
                <div class="flex items-center justify-between gap-4 rounded-2xl border border-slate-200/70 bg-white/70 px-4 py-3 dark:border-white/10 dark:bg-slate-950/60">
                    <dt class="text-slate-500">Category</dt>
                    <dd class="font-semibold text-slate-950 dark:text-white">{{ $post->category?->name }}</dd>
                </div>
                <div class="flex items-center justify-between gap-4 rounded-2xl border border-slate-200/70 bg-white/70 px-4 py-3 dark:border-white/10 dark:bg-slate-950/60">
                    <dt class="text-slate-500">Published</dt>
                    <dd class="font-semibold text-slate-950 dark:text-white">{{ $post->published_at?->format('M d, Y') }}</dd>
                </div>
            </dl>
        </div>
    </aside>
</section>
@elseif ($isProgrammerWebsitesPost)
<section class="article-page__header">
    <div class="site-container">
        <div class="article-page__meta fade-up">
            <span class="badge">{{ $post->category?->name ?? 'Blog' }}</span>
            <span>{{ $post->published_at?->format('M d, Y') }}</span>
            <span class="meta-dot"></span>
            <span>{{ $post->readingTimeMinutes() }} min read</span>
        </div>

        <h1 class="article-page__title fade-up">{{ $post->title }}</h1>
        <p class="lead fade-up">{{ $post->excerpt }}</p>
    </div>
</section>

<section class="article-page__body">
    <div class="article-page__reading-column">
        <div class="fade-up overflow-hidden rounded-[2rem] border border-slate-200 bg-white dark:border-white/10 dark:bg-slate-950/60">
            <iframe
                src="{{ route('articles.programmer-websites-bookmark') }}"
                title="5 Websites Every Programmer Should Bookmark"
                class="block h-[3800px] w-full border-0"
                style="background: #0d0f14;"
                loading="lazy"
            ></iframe>
        </div>
    </div>

    <aside class="space-y-5 lg:sticky lg:top-24 lg:self-start">
        <div class="glass-card rounded-[2rem] p-5">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-500">Blog meta</p>
            <dl class="mt-5 grid gap-4 text-sm">
                <div class="flex items-center justify-between gap-4 rounded-2xl border border-slate-200/70 bg-white/70 px-4 py-3 dark:border-white/10 dark:bg-slate-950/60">
                    <dt class="text-slate-500">Reading time</dt>
                    <dd class="font-semibold text-slate-950 dark:text-white">{{ $post->readingTimeMinutes() }} min</dd>
                </div>
                <div class="flex items-center justify-between gap-4 rounded-2xl border border-slate-200/70 bg-white/70 px-4 py-3 dark:border-white/10 dark:bg-slate-950/60">
                    <dt class="text-slate-500">Category</dt>
                    <dd class="font-semibold text-slate-950 dark:text-white">{{ $post->category?->name }}</dd>
                </div>
                <div class="flex items-center justify-between gap-4 rounded-2xl border border-slate-200/70 bg-white/70 px-4 py-3 dark:border-white/10 dark:bg-slate-950/60">
                    <dt class="text-slate-500">Published</dt>
                    <dd class="font-semibold text-slate-950 dark:text-white">{{ $post->published_at?->format('M d, Y') }}</dd>
                </div>
            </dl>
        </div>
    </aside>
</section>
@else
<section class="article-page__header">
    <div class="site-container">
        <div class="article-page__meta fade-up">
            <span class="badge">{{ $post->category?->name ?? 'Blog' }}</span>
            <span>{{ $post->published_at?->format('M d, Y') }}</span>
            <span class="meta-dot"></span>
            <span>{{ $post->readingTimeMinutes() }} min read</span>
        </div>

        <h1 class="article-page__title fade-up">{{ $post->title }}</h1>

        <div class="article-page__author fade-up">
            <img class="article-page__author-avatar" src="{{ $post->author?->avatar_url ?? asset('images/bishal.jpg') }}" alt="{{ $post->author?->name }}">
            <div>
                <div class="article-card__meta"><span>Written by {{ $post->author?->name }}</span></div>
            </div>
        </div>

        @if($post->thumbnail)
            <img class="article-page__hero fade-up" src="{{ $post->thumbnailUrl() }}" alt="{{ $post->title }}">
        @endif
    </div>
</section>

<section class="article-page__body">
    <div class="article-page__reading-column">
        <div class="article-page__content fade-up">
            <p class="lead">{{ $post->excerpt }}</p>
            {!! $post->body !!}
        </div>

        <div class="article-page__tags fade-up">
            <div class="article-page__tags-label">Tagged in:</div>
            <div class="article-page__tag-list">
                @foreach ($post->tags as $tag)
                    <span class="article-page__tag">{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>

        <div class="article-page__author-box card-surface fade-up">
            <div class="author-bio">
                <img class="author-bio__avatar" src="{{ $post->author?->avatar_url ?? asset('images/bishal.jpg') }}" alt="{{ $post->author?->name }}">
                <div>
                    <h2 class="article-card__title">{{ $post->author?->name }}</h2>
                    <p class="author-bio__text">{{ $post->author?->bio ?? 'Author bio not available.' }}</p>
                </div>
            </div>
        </div>

        <section class="mt-8 grid gap-3 rounded-[2rem] border border-slate-200 bg-slate-50 p-5 dark:border-white/10 dark:bg-slate-950/60 sm:grid-cols-3">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('posts.show', $post)) }}" target="_blank" rel="noopener" class="rounded-2xl bg-white px-4 py-3 text-center text-sm font-semibold text-slate-700 hover:border-amber-400 hover:text-slate-950 dark:bg-slate-900 dark:text-slate-300">Share on Facebook</a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('posts.show', $post)) }}&text={{ urlencode($post->title) }}" target="_blank" rel="noopener" class="rounded-2xl bg-white px-4 py-3 text-center text-sm font-semibold text-slate-700 hover:border-amber-400 hover:text-slate-950 dark:bg-slate-900 dark:text-slate-300">Share on Twitter</a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('posts.show', $post)) }}" target="_blank" rel="noopener" class="rounded-2xl bg-white px-4 py-3 text-center text-sm font-semibold text-slate-700 hover:border-amber-400 hover:text-slate-950 dark:bg-slate-900 dark:text-slate-300">Share on LinkedIn</a>
        </section>

        <div class="mt-10 flex flex-col gap-3 border-y border-slate-200 py-6 dark:border-white/10 sm:flex-row sm:items-center sm:justify-between">
            @if ($previousPost)
                <a href="{{ route('posts.show', $previousPost) }}" class="group rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-white/10 dark:bg-slate-950">
                    <p class="text-xs uppercase tracking-[0.28em] text-slate-400">Previous</p>
                    <p class="mt-1 font-semibold text-slate-950 transition group-hover:text-amber-600 dark:text-white">{{ $previousPost->title }}</p>
                </a>
            @else
                <span></span>
            @endif

            @if ($nextPost)
                <a href="{{ route('posts.show', $nextPost) }}" class="group rounded-2xl border border-slate-200 bg-white px-4 py-3 text-right dark:border-white/10 dark:bg-slate-950">
                    <p class="text-xs uppercase tracking-[0.28em] text-slate-400">Next</p>
                    <p class="mt-1 font-semibold text-slate-950 transition group-hover:text-amber-600 dark:text-white">{{ $nextPost->title }}</p>
                </a>
            @endif
        </div>

        <section class="mt-12">
            <div class="flex items-end justify-between gap-4">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-500">Related posts</p>
                    <h2 class="mt-2 font-display text-3xl font-semibold text-slate-950 dark:text-white">Read next</h2>
                </div>
            </div>

            <div class="mt-6 grid gap-5 lg:grid-cols-3">
                @forelse ($relatedPosts as $relatedPost)
                    <a href="{{ route('posts.show', $relatedPost) }}" class="article-card article-page__related-card article-page__related-card--compact fade-up">
                        <div class="article-page__related-image-wrap">
                            <img class="article-card__image" src="{{ $relatedPost->thumbnailUrl() }}" alt="{{ $relatedPost->title }}">
                        </div>
                        <div class="article-card__body article-page__related-body">
                            <span class="badge">{{ $relatedPost->category?->name ?? 'Story' }}</span>
                            <h3 class="article-card__title">{{ $relatedPost->title }}</h3>
                            <p class="article-card__excerpt">{{ \Illuminate\Support\Str::limit($relatedPost->teaser(), 70) }}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-sm text-slate-500">No related stories yet.</p>
                @endforelse
            </div>
        </section>

        <section class="mt-12 rounded-[2rem] border border-slate-200 bg-white p-6 dark:border-white/10 dark:bg-slate-950/60">
            <div class="flex items-end justify-between gap-4">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-500">Comments</p>
                    <h2 class="mt-2 font-display text-3xl font-semibold text-slate-950 dark:text-white">Join the conversation</h2>
                </div>
                <p class="text-sm text-slate-500">{{ $post->comments->count() }} comments</p>
            </div>

            @if (session('comment_status'))
                <div class="mt-5 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-200">{{ session('comment_status') }}</div>
            @endif

            <div class="mt-6 grid gap-5">
                @foreach ($post->comments as $comment)
                    <div class="rounded-[1.5rem] border border-slate-200 p-5 dark:border-white/10">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="font-semibold text-slate-950 dark:text-white">{{ $comment->name }}</p>
                                <p class="text-sm text-slate-500">{{ $comment->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                        <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $comment->body }}</p>
                    </div>
                @endforeach
            </div>

            <form method="POST" action="{{ route('posts.comments.store', $post) }}" class="mt-8 grid gap-4 sm:grid-cols-2">
                @csrf
                <label class="sm:col-span-1">
                    <span class="mb-2 block text-sm font-medium text-slate-600 dark:text-slate-300">Name</span>
                    <input type="text" name="name" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-amber-400 dark:border-white/10 dark:bg-slate-950 dark:text-white">
                </label>
                <label class="sm:col-span-1">
                    <span class="mb-2 block text-sm font-medium text-slate-600 dark:text-slate-300">Email</span>
                    <input type="email" name="email" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-amber-400 dark:border-white/10 dark:bg-slate-950 dark:text-white">
                </label>
                <label class="sm:col-span-2">
                    <span class="mb-2 block text-sm font-medium text-slate-600 dark:text-slate-300">Comment</span>
                    <textarea name="body" rows="5" class="w-full rounded-[1.5rem] border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-amber-400 dark:border-white/10 dark:bg-slate-950 dark:text-white"></textarea>
                </label>
                <div class="sm:col-span-2">
                    <button class="rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white hover:-translate-y-0.5 hover:bg-amber-500 hover:text-slate-950">Post comment</button>
                </div>
            </form>
        </section>
    </div>

    <aside class="space-y-5 lg:sticky lg:top-24 lg:self-start">
        <div class="glass-card rounded-[2rem] p-5">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-500">Reading guide</p>
            <nav class="mt-5 grid gap-3">
                @foreach ($toc as $item)
                    <a href="{{ $item['href'] }}" class="toc-link">{{ $item['label'] }}</a>
                @endforeach
            </nav>
        </div>

        <div class="glass-card rounded-[2rem] p-5">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-500">Blog meta</p>
            <dl class="mt-5 grid gap-4 text-sm">
                <div class="flex items-center justify-between gap-4 rounded-2xl border border-slate-200/70 bg-white/70 px-4 py-3 dark:border-white/10 dark:bg-slate-950/60">
                    <dt class="text-slate-500">Reading time</dt>
                    <dd class="font-semibold text-slate-950 dark:text-white">{{ $post->readingTimeMinutes() }} min</dd>
                </div>
                <div class="flex items-center justify-between gap-4 rounded-2xl border border-slate-200/70 bg-white/70 px-4 py-3 dark:border-white/10 dark:bg-slate-950/60">
                    <dt class="text-slate-500">Category</dt>
                    <dd class="font-semibold text-slate-950 dark:text-white">{{ $post->category?->name }}</dd>
                </div>
                <div class="flex items-center justify-between gap-4 rounded-2xl border border-slate-200/70 bg-white/70 px-4 py-3 dark:border-white/10 dark:bg-slate-950/60">
                    <dt class="text-slate-500">Published</dt>
                    <dd class="font-semibold text-slate-950 dark:text-white">{{ $post->published_at?->format('M d, Y') }}</dd>
                </div>
            </dl>
        </div>
    </aside>
</section>

@endif

@endsection

@push('meta')
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/article-single.css">
@endpush

@push('scripts')
    @if ($isVscodePost)
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const carousel = document.querySelector('[data-vscode-carousel]');
                if (!carousel) return;

                const track = carousel.querySelector('[data-vscode-track]');
                const slides = Array.from(track.children);
                const prev = carousel.querySelector('[data-vscode-prev]');
                const next = carousel.querySelector('[data-vscode-next]');
                const dots = carousel.closest('section')?.querySelector('[data-vscode-dots]');
                let index = 0;

                const renderDots = () => {
                    if (!dots) return;
                    dots.innerHTML = '';
                    slides.forEach((_, i) => {
                        const dot = document.createElement('button');
                        dot.type = 'button';
                        dot.className = `h-2.5 w-2.5 rounded-full transition ${i === index ? 'bg-cyan-400 shadow-[0_0_8px_rgba(0,200,255,.7)]' : 'bg-slate-600'}`;
                        dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
                        dot.addEventListener('click', () => update(i));
                        dots.appendChild(dot);
                    });
                };

                const update = (nextIndex) => {
                    index = (nextIndex + slides.length) % slides.length;
                    track.style.transform = `translateX(-${index * 100}%)`;
                    renderDots();
                };

                prev?.addEventListener('click', () => update(index - 1));
                next?.addEventListener('click', () => update(index + 1));
                window.addEventListener('keydown', (event) => {
                    if (event.key === 'ArrowLeft') update(index - 1);
                    if (event.key === 'ArrowRight') update(index + 1);
                });

                update(0);
            });
        </script>
    @endif
@endpush

@push('scripts')
    <script src="/js/animations.js"></script>
    <script src="/js/main.js"></script>
@endpush

@section('body_class', 'article-page')