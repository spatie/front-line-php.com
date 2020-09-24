@extends('front.layouts.master')

@section('content')


    <header>
        @include('partials.header')
    
        <div class="mx-auto max-w-5xl px-4 sm:px-16 py-16">
            <p class="font-display text-5xl sm:text-6xl md:text-7xl leading-none">
                Front Line PHP
            </p>
            <h1 class="mt-2 font-semibold text-3xl sm:text-4xl leading-snug">
                @yield('title')
            </h1>
        </div>
    </header>

    <main class="mx-auto max-w-5xl px-4 sm:px-16" style="background-image: linear-gradient(to top, #fff 20%, #daf1f5)">
        <section class="py-16 markup markup-links markup-lists markup-code markup-tables">
            @yield('article')
        </section>

        @include('partials.cta')
    </main>

    @include('partials.footer')
    
@endsection
