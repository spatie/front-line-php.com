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
        </div>
    </header>

    <main class="mx-auto max-w-article px-4 sm:px-16" style="background-image: linear-gradient(to bottom, #daf1f5, #fff 200vh )">
        <article class="py-16 markup markup-links markup-lists markup-code markup-tables">
            @yield('article')
        </article>

        @include('partials.cta')
    </main>

    @include('partials.footer')
    
@endsection
