<footer class="relative z-10 mx-auto w-full max-w-[1600px] px-4 pb-10 sm:px-6 lg:px-8">
    <div class="glass-card rounded-[2rem] px-6 py-8 sm:px-8">
        <div class="grid gap-8 lg:grid-cols-[1.15fr_0.85fr] lg:items-end">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.35em] text-[#f0a85a]">Bishal Aryal</p>
                <p class="mt-3 max-w-2xl text-sm leading-7 text-[#d9cfc1]">An editorial blog about design, technology, and the craft of making ideas feel expensive.</p>
                <p class="mt-4 text-xs uppercase tracking-[0.3em] text-[#8d8478]">Laravel / Blade / Motion / Writing</p>
            </div>

            <div class="flex flex-wrap items-center gap-3 lg:justify-end">
                <a href="https://github.com/Bishal10000" target="_blank" rel="noopener" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/10 bg-white/5 text-[#f5f0e8] hover:-translate-y-0.5 hover:border-[#c8622a] hover:bg-[#c8622a]/12" aria-label="GitHub">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5" aria-hidden="true"><path d="M12 .5A12 12 0 0 0 8.2 23.9c.6.1.8-.2.8-.6v-2c-3.3.7-4-1.4-4-1.4-.5-1.3-1.2-1.6-1.2-1.6-1-.7.1-.7.1-.7 1.1.1 1.8 1.1 1.8 1.1 1 .1.6 2.6 3.4 2.2.1-.7.4-1.2.7-1.5-2.7-.3-5.5-1.3-5.5-5.8 0-1.3.5-2.3 1.2-3.1-.1-.3-.5-1.6.1-3.3 0 0 1-.3 3.2 1.2a11 11 0 0 1 5.8 0C17 5 18 5.3 18 5.3c.6 1.7.2 3 .1 3.3.8.8 1.2 1.8 1.2 3.1 0 4.6-2.8 5.5-5.5 5.8.4.3.8 1 .8 2.1v3.1c0 .3.2.7.8.6A12 12 0 0 0 12 .5Z"/></svg>
                </a>
                <a href="https://www.linkedin.com/in/bishal-aryal-829286310/" target="_blank" rel="noopener" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/10 bg-white/5 text-[#f5f0e8] hover:-translate-y-0.5 hover:border-[#c8622a] hover:bg-[#c8622a]/12" aria-label="LinkedIn">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5" aria-hidden="true"><path d="M4.98 3.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5ZM3 9h4v12H3V9Zm7 0h3.8v1.7h.1c.5-1 1.8-2.1 3.8-2.1 4 0 4.7 2.6 4.7 6V21h-4v-5.7c0-1.4 0-3.1-1.9-3.1s-2.2 1.5-2.2 3V21h-4V9Z"/></svg>
                </a>
                <a href="{{ route('blog.feed.page') }}" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-[#d9cfc1] hover:-translate-y-0.5 hover:border-[#c8622a] hover:bg-[#c8622a]/12 hover:text-[#fff7ec]">RSS Feed</a>
                <a href="{{ route('sitemap') }}" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm font-medium text-[#d9cfc1] hover:-translate-y-0.5 hover:border-[#c8622a] hover:bg-[#c8622a]/12 hover:text-[#fff7ec]">Sitemap</a>
            </div>
        </div>

        <div class="mt-8 flex flex-col gap-3 border-t border-white/8 pt-6 text-xs uppercase tracking-[0.25em] text-[#8d8478] sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ now()->year }} Bishal Aryal. All rights reserved.</p>
            <p>Designed as a magazine-grade reading experience.</p>
        </div>
    </div>
</footer>