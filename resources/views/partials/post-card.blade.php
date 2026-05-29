<article class="group flex h-full flex-col overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white/90 shadow-[0_20px_60px_rgba(15,23,42,0.08)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_28px_70px_rgba(15,23,42,0.12)] dark:border-white/10 dark:bg-slate-950/80">
    <a href="{{ route('posts.show', $post) }}" class="relative block overflow-hidden">
        <div class="absolute left-4 top-4 z-10 rounded-full bg-white/95 px-3 py-1 text-[0.68rem] font-semibold uppercase tracking-[0.24em] text-slate-950 shadow-sm backdrop-blur">{{ $post->category?->name ?? 'Story' }}</div>
        <img src="{{ $post->thumbnailUrl() }}" alt="{{ $post->title }}" class="h-60 w-full object-cover transition duration-700 group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-950/10 to-transparent"></div>
    </a>

    <div class="flex flex-1 flex-col p-6">
        <div class="flex items-center gap-3 text-[0.68rem] font-semibold uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">
            <span>{{ $post->published_at?->format('M d, Y') }}</span>
            <span>•</span>
            <span>{{ $post->readingTimeMinutes() }} min read</span>
        </div>

        <h3 class="mt-4 font-display text-2xl font-semibold leading-tight text-slate-950 dark:text-white">{{ $post->title }}</h3>

        <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $post->teaser() }}</p>

        <div class="mt-5 flex flex-wrap gap-2">
            @foreach ($post->tags->take(3) as $tag)
                <a href="{{ route('tags.show', $tag) }}" class="rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-500 hover:border-amber-400 hover:text-slate-950 dark:border-white/10 dark:bg-white/5 dark:text-slate-300">#{{ $tag->name }}</a>
            @endforeach
        </div>

        <div class="mt-6 flex items-center justify-between border-t border-slate-200/80 pt-4 dark:border-white/10">
            <div class="flex items-center gap-3">
                <img src="{{ $post->author?->avatar_url ?? 'https://picsum.photos/seed/bishal-post-card-avatar/160/160' }}" alt="{{ $post->author?->name ?? 'Author' }}" class="h-10 w-10 rounded-full object-cover">
                <div>
                    <p class="text-sm font-semibold text-slate-950 dark:text-white">{{ $post->author?->name ?? 'Bishal Aryal' }}</p>
                    <p class="text-xs text-slate-500">{{ $post->author?->role ?? 'Editor' }}</p>
                </div>
            </div>
            <a href="{{ route('posts.show', $post) }}" class="inline-flex items-center gap-2 rounded-full bg-slate-950 px-4 py-2 text-sm font-semibold text-white hover:-translate-y-0.5 hover:bg-amber-500 hover:text-slate-950 dark:bg-white dark:text-slate-950">Read</a>
        </div>
    </div>
</article>