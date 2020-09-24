@extends('front.layouts.master')

@section('title', 'Writing modern web applications in PHP 8')

@section('description', 'Writing modern web applications in PHP 8 by Brent Roose, accompagnied with videos by Freek Van der Herten.')

@section('content')


    <header>
        @include('partials.header')
    
        <div class="mx-auto max-w-5xl px-4 sm:px-16 py-16">
            <div class="absolute left-0 top-0 ml-4 sm:ml-16 -mt-5 inline-flex items-center bg-yellow-500 px-8 h-10 font-bold whitespace-no-wrap text-xl">
                Coming december 2020
            </div>
            <h1 class="font-display text-5xl sm:text-6xl md:text-7xl leading-none">
                Front Line PHP
            </h1>
            <p class="mt-2 font-semibold text-3xl sm:text-4xl leading-snug">
                Writing modern applications 
                <br>
                with PHP 8
            </p>
        </div>
    </header>

    <main class="mx-auto max-w-5xl px-4 sm:px-16 mt-16" style="background-image: linear-gradient(to top, #fff 20%, #daf1f5)">
        <section class="grid md:grid-cols-2 gap-8">
            <div class="-mt-16">
                <img src="/images/cover-1200.jpg" class="mx-auto w-full max-w-xl shadow-2xl">
            </div>

            <div class="md:-mt-16 pb-24" x-data="{ open: false }">
                <div class="w-full bg-black group cursor-hand" @click="open = true">
                    <img class="w-full opacity-100 group-hover:opacity-75 transition-opacity duration-300" srcset="/images/intro-1600.jpg 1600w" sizes="33vw" alt="Video still" src="/images/intro-1600.jpg">
                    <div class="absolute -mb-6 bottom-0 w-full flex items-center justify-center">
                        <button class="h-12 inline-flex items-center px-6 font-display text-xl text-white text-opacity-90 bg-purple-500">
                            Watch intro <i class="ml-4 fas fa-play text-xs text-blue-200"></i>
                        </button>
                    </div>
                </div>
                
                <template x-if="open">
                    <div style="background-color:rgba(0,0,0,0.75)" class="fixed inset-0 p-8 lg:p-16 z-50 fix-z flex items-center justify-center" @keydown.window.escape="open = false">
                        <button class="absolute top-0 right-0 m-6 leading-none text-yellow-500 text-3xl">×</button>
                        <iframe src="https://player.vimeo.com/video/434969839?autoplay=1" class="w-full h-full" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" @click.away="open = false">
                        </iframe>
                    </div>
                </template>

                <div class="md:ml-8 mt-24">
                    <p class="text-3xl font-semibold">
                        An <span class="marker">ebook</span> on cutting edge tactics in PHP 8, accompagnied by <span class="marker">videos</span> with pratical use cases.
                    </p>

                    <p class="mt-12 text-xl font-semibold markup-links leading-relaxed">
                        Brought to you by open source veterans <a href="https://twitter.com/brendt_gd">Brent Roose</a> & <a href="https://twitter.com/freekmurze">Freek Van der Herten</a> from Spatie.
                    </p>
                </div>
            </div>
        </section>

        @include('partials.cta')
    </main>

    @include('partials.footer')
    
@endsection
