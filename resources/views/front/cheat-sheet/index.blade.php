@extends('front.layouts.master')

@section('title', 'Modern PHP Cheat Sheet')

@section('description', 'Modern PHP Cheat Sheet from the book Front Line PHP')

@section('content')
<header>
    <div class="h-32">
        @include('partials.header')
        <div class="mx-auto px-4 sm:px-16 h-32 flex items-center">
            <a href="/" class="font-display leading-none text-white text-xl">
                <span>&larr;</span> Front Line PHP
            </a>
        </div>
    </div>

    <div class="mx-auto px-4 sm:px-16 py-16">
        <h1 class="font-display text-4xl sm:text-5xl md:text-6xl leading-none">
            @yield('title')
        </h1>
        <p>
            A to-the-point summary of all awesome PHP features
        </p>
    </div>
</header>

<div class="mx-auto sm:px-16">
    @yield('header_cta')
</div>

<main class="mx-auto px-4 sm:px-16">
    <div class="lg:flex lg:space-x-16 ">
        <nav class="text-sm w-64 lg:w-auto flex-none pb-12">
            @include('front.cheat-sheet.partials.nav')
        </nav>
        <div>
            @include('partials.cta-compact')
            <article class="grid lg:grid-cols-2 gap-12 pb-24 markup markup-links markup-lists markup-code markup-tables">


                @include('front.cheat-sheet.partials.arrays')

                @include('front.cheat-sheet.partials.attributes')

                @include('front.cheat-sheet.partials.cosmetics')

                @include('front.cheat-sheet.partials.enums')
                
                @include('front.cheat-sheet.partials.exceptions')

                @include('front.cheat-sheet.partials.match')

                @include('front.cheat-sheet.partials.null')

                @include('front.cheat-sheet.partials.named-arguments')

                @include('front.cheat-sheet.partials.performance')

                @include('front.cheat-sheet.partials.property-promotion')

                @include('front.cheat-sheet.partials.short-closures')

                @include('front.cheat-sheet.partials.types')

            </article>
        </div>
    </div>

    <div class="max-w-5xl mx-auto">
        @include('partials.cta-promo')
    </div>
</main>

@include('partials.footer')

@endsection


