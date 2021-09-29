@extends('front.layouts.master')

@section('content')
    <header>
        <div class="h-32">
            @include('partials.header')
            <div class="mx-auto max-w-article px-4 sm:px-16 h-32 flex items-center">
                <a href="/" class="font-display leading-none text-white text-xl">
                    <span>&larr;</span> Front Line PHP
                </a>
            </div>
        </div>

        <div class="mx-auto max-w-article px-4 sm:px-16 py-16">
            <h1 class="font-display text-4xl sm:text-5xl md:text-6xl leading-none">
                 @yield('title')
            </h1>
            <p>
                @yield('subtitle')
            </p>
        </div>
    </header>

    <div class="mx-auto max-w-article sm:px-16">
        @yield('header_cta')
    </div>

    <main class="mx-auto max-w-article ">
        <article class="pb-8">
            @yield('video')
        </article>

    </main>

    <aside class="mx-auto max-w-5xl px-4 sm:px-16">
        @yield('footer_cta')
    </aside>

    @include('partials.footer')

@endsection
