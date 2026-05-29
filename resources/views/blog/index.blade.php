@extends('layouts.blog')

@section('title', 'All Articles')
@section('meta_description', 'Browse all articles by Bishal Aryal across categories.')

@section('content')
@push('meta')
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/articles.css">
@endpush

@push('scripts')
    <script src="/js/animations.js"></script>
    <script src="/js/main.js"></script>
@endpush
<section class="articles-page__header">
    <div class="site-container">
        <div class="section-label fade-up">BISHAL ARYAL</div>
        <h1 class="articles-page__title fade-up">All Articles</h1>
        <p class="articles-page__breadcrumb fade-up">Home / Articles</p>
    </div>
</section>

<section class="articles-filter" data-filter-bar>
    <div class="articles-filter__inner">
        <div class="articles-filter__left">
            <div class="articles-filter__pills" aria-label="Filter articles by category">
                <button class="articles-filter__pill is-active" type="button" data-filter-pill="all">All</button>
                <button class="articles-filter__pill" type="button" data-filter-pill="technology">Technology</button>
                <button class="articles-filter__pill" type="button" data-filter-pill="design">Design</button>
                <button class="articles-filter__pill" type="button" data-filter-pill="travel">Travel</button>
                <button class="articles-filter__pill" type="button" data-filter-pill="philosophy">Philosophy</button>
                <button class="articles-filter__pill" type="button" data-filter-pill="code">Code</button>
                <button class="articles-filter__pill" type="button" data-filter-pill="life">Life</button>
                <button class="articles-filter__pill" type="button" data-filter-pill="culture">Culture</button>
            </div>
        </div>
        <div class="articles-filter__search">
            <label class="screen-reader-only" for="article-search">Search articles</label>
            <input id="article-search" type="text" data-article-search placeholder="Search titles and topics...">
        </div>
    </div>
</section>

<section class="articles-grid">
    <div class="site-container">
        <div class="articles-grid__list">
            @if ($highlightedPost)
                <a class="article-card fade-up" data-article-card data-category="code" data-date="{{ $highlightedPost->published_at?->format('Y-m-d') ?? '2026-05-29' }}" data-views="1500" data-search="{{ e($highlightedPost->title.' '.$highlightedPost->excerpt.' '.$highlightedPost->thumbnail) }}" href="{{ route('posts.show', $highlightedPost) }}">
                    <img class="article-card__image" src="{{ $highlightedPost->thumbnailUrl() }}" alt="{{ $highlightedPost->title }}">
                    <div class="article-card__body">
                        <span class="badge">{{ $highlightedPost->category?->name ?? 'Code' }}</span>
                        <h2 class="article-card__title">{{ $highlightedPost->title }}</h2>
                        <p class="article-card__excerpt">{{ $highlightedPost->excerpt }}</p>
                        <div class="article-card__meta"><span>{{ $highlightedPost->published_at?->format('F d, Y') }}</span><span class="meta-dot"></span><span>{{ $highlightedPost->readingTimeMinutes() }} min read</span></div>
                    </div>
                </a>
            @endif
            @foreach ($latestPosts as $post)
                <a class="article-card fade-up" data-article-card data-category="{{ strtolower($post->category?->slug ?? 'uncategorized') }}" data-search="{{ e($post->title.' '.$post->excerpt.' '.($post->category?->name ?? '')) }}" href="{{ route('posts.show', $post) }}">
                    <img class="article-card__image" src="{{ $post->thumbnailUrl() }}" alt="{{ $post->title }}">
                    <div class="article-card__body">
                        <span class="badge">{{ $post->category?->name ?? 'Blog' }}</span>
                        <h2 class="article-card__title">{{ $post->title }}</h2>
                        <p class="article-card__excerpt">{{ $post->excerpt }}</p>
                        <div class="article-card__meta"><span>{{ $post->published_at?->format('F d, Y') }}</span><span class="meta-dot"></span><span>{{ $post->readingTimeMinutes() }} min read</span></div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="articles-grid__empty card-surface" data-articles-empty>
            <div class="article-card__body" style="padding: 2rem; text-align: center;">
                <h2 class="article-card__title">No articles match that filter yet.</h2>
                <p class="article-card__excerpt">Try a different category or clear the search input to bring the full archive back.</p>
            </div>
        </div>

        <div class="articles-grid__load-more">
            <button class="btn btn-outline" type="button" data-load-more-button>Load More Articles</button>
        </div>
    </div>
</section>
@endsection
