@php
    $navLinks = [
        ['label' => 'Home', 'href' => url('/index.html'), 'route' => 'home'],
        ['label' => 'Blog', 'href' => url('/articles.html'), 'route' => 'articles'],
        ['label' => 'About', 'href' => url('/about.html'), 'route' => 'about'],
        ['label' => 'Newsletter', 'href' => url('/newsletter.html'), 'route' => 'newsletter'],
    ];
    $current = request()->path();
@endphp

<header class="site-header">
    <div class="site-header__inner">
        <a class="site-brand" href="/index.html" aria-label="Bishal Aryal home">
            <span class="site-brand__mark" aria-hidden="true"></span>
            <span>Bishal Aryal</span>
        </a>
        <nav class="site-nav" aria-label="Primary navigation">
            <div class="site-nav__links">
                @foreach ($navLinks as $link)
                    @php $isActive = str_contains($current, trim(parse_url($link['href'], PHP_URL_PATH), '/')) @endphp
                    <div class="site-nav__item"><a class="site-nav__link {{ $isActive ? 'is-active' : '' }}" href="{{ $link['href'] }}">{{ $link['label'] }}</a></div>
                @endforeach
            </div>
            <button class="site-nav__toggle" type="button" data-mobile-menu-toggle aria-expanded="false" aria-label="Open menu">
                <span class="site-nav__toggle-lines" aria-hidden="true"><span></span><span></span><span></span></span>
            </button>
        </nav>
    </div>
</header>

<div class="site-nav__overlay" data-mobile-menu-overlay>
    <div class="site-nav__panel">
        <div class="flex-between" style="margin-bottom: 1.25rem;">
            <span class="site-brand"><span class="site-brand__mark" aria-hidden="true"></span><span>Bishal Aryal</span></span>
            <button class="btn btn-ghost" type="button" data-mobile-menu-close>Close</button>
        </div>
        <nav class="site-nav__mobile-links" aria-label="Mobile navigation">
            <a class="site-nav__mobile-link" href="/index.html">Home <span>Start</span></a>
            <a class="site-nav__mobile-link" href="/articles.html">Blog <span>Read</span></a>
            <a class="site-nav__mobile-link" href="/about.html">About <span>Story</span></a>
            <a class="site-nav__mobile-link" href="/newsletter.html">Newsletter <span>Weekly</span></a>
            <div class="site-nav__mobile-titles">
                <div class="site-nav__mobile-titles-label">Blog Titles</div>
                <a class="site-nav__mobile-title" href="/article-single.html">The Quiet Revolution Happening Inside Every AI Model</a>
                <a class="site-nav__mobile-title" href="/article-single.html">Why ICT Infrastructure Matters More Than Apps</a>
                <a class="site-nav__mobile-title" href="/article-single.html">What Coding Taught Me About Writing</a>
            </div>
        </nav>
    </div>
</div>