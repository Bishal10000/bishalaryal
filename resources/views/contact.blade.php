@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<section class="py-8 flex-1 flex items-center justify-center">
    <div class="rounded-[2rem] border border-teal-200 bg-gradient-to-r from-teal-600 to-cyan-600 px-6 py-12 text-white shadow-[0_24px_70px_rgba(13,148,136,0.25)] w-full max-w-3xl">
        <div class="text-center">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-teal-100">Contact</p>
            <h1 class="mt-3 font-display text-4xl font-semibold tracking-tight">Have a web project in mind?</h1>
            <p class="mt-4 text-lg leading-8 text-teal-50">
                Whether you need a crowdfunding platform, management system, or custom web application, let's discuss your requirements and build something reliable.
            </p>

            <div class="mt-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-center">
                <a href="mailto:bishalaryal975@gmail.com" class="inline-flex items-center justify-center rounded-lg bg-white px-8 py-4 text-base font-semibold text-slate-900 transition hover:bg-slate-100">
                    Email: bishalaryal975@gmail.com
                </a>
            </div>

            <div class="mt-8 flex items-center justify-center gap-4">
                <a href="https://github.com/Bishal10000" class="inline-flex items-center justify-center h-12 w-12 rounded-full border border-white/50 bg-white/10 text-white transition hover:bg-white/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .5A12 12 0 0 0 8.2 23.9c.6.1.8-.2.8-.6v-2c-3.3.7-4-1.4-4-1.4-.5-1.3-1.2-1.6-1.2-1.6-1-.7.1-.7.1-.7 1.1.1 1.8 1.1 1.8 1.1 1 .1.6 2.6 3.4 2.2.1-.7.4-1.2.7-1.5-2.7-.3-5.5-1.3-5.5-5.8 0-1.3.5-2.3 1.2-3.1-.1-.3-.5-1.6.1-3.3 0 0 1-.3 3.2 1.2a11 11 0 0 1 5.8 0C17 5 18 5.3 18 5.3c.6 1.7.2 3 .1 3.3.8.8 1.2 1.8 1.2 3.1 0 4.6-2.8 5.5-5.5 5.8.4.3.8 1 .8 2.1v3.1c0 .3.2.7.8.6A12 12 0 0 0 12 .5Z"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
