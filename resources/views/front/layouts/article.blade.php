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

    <aside class="mx-auto max-w-article sm:px-16">
        <div style="background-image: linear-gradient(to right, #0756b0 0%, #4530a8 80%)" class="z-10 -mb-4 text-white px-6 py-4 text-sm">
            This sample is an excerpt from the ebook <a href="/"><strong class="font-semibold hover:opacity-75">Front Line PHP</strong></a>. 
            <br>Check out <a href="/" class="underline hover:opacity-75">the entire book</a> to learn how to build modern applications in PHP 8.
        </div>
    </aside>

    <div class="mx-auto max-w-article sm:px-16">
        @yield('header_cta')
    </div>

    <main class="mx-auto max-w-article px-4 sm:px-16" style="background-image: linear-gradient(to bottom, #daf1f566, #fff 50vh )">
        <article class="py-16 markup markup-links markup-lists markup-code markup-tables">
            @yield('article')
        </article>

    </main>

    <aside class="mx-auto max-w-5xl px-4 sm:px-16">
        @yield('footer_cta')
    </aside>

    @include('partials.footer')

@endsection
