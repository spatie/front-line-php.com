@extends('front.layouts.master')

@section('title', 'Building modern web applications with PHP 8')

@section('description', 'Building modern web applications with PHP 8 by Brent Roose, accompanied by videos by Freek Van der Herten.')

@section('content')


<header>
    <div class="h-32">
        @include('partials.header')
    </div>

    <div class="mx-auto max-w-5xl px-4 sm:px-16 py-16">
        <div class="absolute left-0 top-0 ml-4 sm:ml-16 -mt-5 inline-flex items-center bg-yellow-500 px-8 h-10 font-bold whitespace-no-wrap text-xl">
            Coming early December 2020
        </div>
        <h1 class="font-display text-5xl sm:text-6xl md:text-7xl leading-none">
            Front Line PHP
        </h1>
        <p class="mt-2 font-semibold text-3xl sm:text-4xl leading-snug">
            Building modern applications
            <br>
            with PHP 8
        </p>
    </div>
</header>

<main class="mx-auto max-w-5xl px-4 sm:px-16 mt-16" style="background-image: linear-gradient(to top, #fff 20%, #daf1f5)">
    <section class="grid md:grid-cols-2 gap-8">
        <div class="-mt-16">
            <img alt="Front Line PHP" srcset="/images/cover-1200.jpg 1200w, /images/cover-600.jpg 600w" sizes="500px, (min-width:768px) 45vw" src="/images/cover-1200.jpg" class="mx-auto w-full max-w-xl shadow-2xl">
        </div>

        <div class="md:-mt-16 pb-16" x-data="{ open: false }">
            <div class="w-full bg-black group cursor-hand" @click="open = true">
                <img srcset="/images/intro-1600.jpg 1600w, /images/intro-800.jpg 800w" sizes="100vw, (min-width:768px) 45vw" src="/images/intro-1600.jpg" class="w-full opacity-100 group-hover:opacity-75 transition-opacity duration-300" alt="Video still">
                <div class="absolute -mb-6 bottom-0 w-full flex items-center justify-center">
                    <button class="h-12 inline-flex items-center px-6 font-display text-xl text-white text-opacity-90 bg-purple-500">
                        Watch intro <i class="ml-4 fas fa-play text-xs text-blue-200"></i>
                    </button>
                </div>
            </div>

            <template x-if="open">
                <div style="background-color:rgba(0,0,0,0.75)" class="fixed inset-0 p-8 lg:p-16 z-50 fix-z flex items-center justify-center" @keydown.window.escape="open = false">
                    <button class="absolute top-0 right-0 m-6 leading-none text-yellow-500 text-3xl">×</button>
                    <iframe src="https://player.vimeo.com/video/463793201?autoplay=1" class="w-full h-full" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" @click.away="open = false">
                    </iframe>
                </div>
            </template>

            <div class="md:ml-8 mt-24">
                <p class="text-3xl font-semibold">
                    An <span class="marker">ebook</span> on cutting edge tactics in PHP 8, accompanied by <span class="marker">videos</span> and practical examples.
                </p>

                <p class="mt-12 text-xl font-semibold markup-links leading-relaxed">
                    Brought to you by open source veterans <a href="https://twitter.com/brendt_gd">Brent Roose</a> &amp; <a href="https://twitter.com/freekmurze">Freek Van der Herten</a> from <a class="bg-none" href="https://spatie.be">Spatie</a>.
                </p>
            </div>
        </div>
    </section>

    <section class="mb-24">
        <h2 class="font-display text-3xl sm:text-4xl md:text-5xl leading-none">Table of contents</h2>

        <div class="mt-8 grid md:grid-cols-3 gap-8">
            <div>
                <h3 class="font-semibold text-xl">
                    <div class="text-3xl font-display leading-none">Part I</div>
                    PHP, the Language
                </h3>

                <ol class="grid gap-2 text-lg md:text-base mt-6 list-decimal pl-12 border-l-2 border-black leading-tight">
                    <li>PHP today</li>
                    <li>New versions</li>
                    <li>PHP's type system</li>
                    <li>Static analysis</li>
                    <li>Property promotion</li>
                    <li>Named arguments</li>
                    <li>Attributes</li>
                    <li>Short closures</li>
                    <li>Working with arrays</li>
                    <li>Match</li>
                </ol>
            </div>

            <div>
                <h3 class="font-semibold text-xl">
                    <div class="text-3xl font-display leading-none">Part II</div>
                    Building With PHP
                </h3>

                <ol start=11 class="grid gap-2 text-lg md:text-base mt-6 list-decimal pl-12 border-l-2 border-black leading-tight">
                    <li>Object oriented PHP</li>
                    <li>MVC Frameworks</li>
                    <li>Dependency Injection</li>
                    <li>Testing</li>
                    <li>Style guide</li>
                </ol>
            </div>

            <div>
                <h3 class="font-semibold text-xl">
                    <div class="text-3xl font-display leading-none">Part III</div>
                    PHP In Depth
                </h3>

                <ol start=16 class="grid gap-2 text-lg md:text-base mt-6 list-decimal pl-12 border-l-2 border-black leading-tight">
                    <li>FFI</li>
                    <li>JIT</li>
                    <li>Preloading</li>
                    <li>Internals</li>
                    <li>Type variance</li>
                    <li>Async PHP</li>
                    <li>Event driven development</li>
                    <li>Functional programming</li>
                    <li>Cheat Sheet</li>
                </ol>
            </div>
        </div>
    </section>

    @include('partials.cta')
</main>

@include('partials.footer')

@endsection
