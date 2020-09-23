@extends('front.layouts.master')

@section('title', 'Writing modern web applications in PHP 8')

@section('description', 'Writing modern web applications in PHP 8 by Brent Roose, accompagnied with videos by Freek Van der Herten.')

@section('content')


    <header>
        <img class="w-full h-32 object-cover" src="/images/header-2400.jpg">
    
        <div class="mx-auto max-w-5xl px-4 sm:px-16 py-24">
            <div class="absolute top-0 -mt-5 inline-flex items-center bg-yellow-500 px-4 h-10 font-bold">
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
                        Brought to you by open source veterans <a href="">Brent Roose</a> & <a href="">Freek Van der Herten</a> from Spatie.
                    </p>
                </div>
            </div>
        </section>

        <section class="z-10 -mb-8 bg-purple-500 px-8 md:px-16 py-16 shadow-xl" style="background-image: linear-gradient(to right, #0756b0 0%, #4530a8 80%)">
                <div class="absolute inset-0 overflow-hidden">
                    <div style="left: 50%" class="line-1 | absolute top-0 bg-black bg-opacity-50 w-1 h-full"></div>
                    <div style="left: 53%" class="line-2 | absolute top-0 bg-black bg-opacity-25 w-1 h-full"></div>
                    <div style="left: 63%" class="line-3 | absolute top-0 bg-black bg-opacity-75 w-2 h-full"></div>
                    <div style="left: 68%" class="line-4 | absolute top-0 bg-black bg-opacity-50 w-2 h-full"></div>
                    <div style="left: 75%" class="line-5 | absolute top-0 bg-black bg-opacity-75 w-1 h-full"></div>
                    <div style="left: 83%" class="line-6 | absolute top-0 bg-black bg-opacity-25 w-1 h-full"></div>
                </div>
            <div>
                
                
                <h2 class="text-6xl font-display mb-8 leading-none text-white text-opacity-90">
                    Walk up front
                </h2>
                <div class="block text-xl font-semibold leading-relaxed text-white text-opacity-90">
                    Get previews and early access to the ebook and videos.
                    <br>
                    Launching december 2020.    
                </div>
            </div>

            <form class="flex mt-12 bg-white">
                <input type="text" placeholder="Email" class="input flex-grow px-3 text-lg">
                <div class="moving-button">
                    <button class="button">
                        Subcribe
                    </button>
                </div>
            </form>
        </section>
    </main>

    <footer class="bg-black pt-32 pb-8">
        <img src="/images/footer.jpg" class="absolute top-0 left-0 w-full h-full object-cover opacity-20">
        <nav class="flex items-end justify-between mx-auto max-w-5xl px-4 sm:px-16">
            <a href="https://spatie.be">
                <svg class="w-auto h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 255.12"><title>SPATIE</title>    <g><path class="fill-current text-spatie" d="M0,9.77A10,10,0,0,1,10.26,0H585a10,10,0,0,1,10.28,9.77V245.36A10,10,0,0,1,585,255.12H10.26A10,10,0,0,1,0,245.36V9.77Z"></path></g><g><path d="M95.6,156.66l10.87-14.84c6.46,5.32,13.82,8.95,21.52,8.95,5.44,0,8.27-2.38,8.27-5.78v-0.11c0-3.17-2.38-5.1-11.67-8.38-14.95-5.1-25.48-10.53-25.48-24.92v-0.34c0-14.38,11-24.46,28.31-24.46,10.65,0,20,2.94,28.31,9.63l-10.31,15.17c-5.44-4.19-12-7.25-18.46-7.25-4.64,0-7.25,2.27-7.25,5.21v0.11c0,3.51,2.49,5.32,12.57,9.06,15.06,4.87,24.46,11,24.46,24.46v0.23c0,15.4-11.89,24.92-28.88,24.92A48.26,48.26,0,0,1,95.6,156.66Z" class="fill-current text-white"></path><path d="M175.67,87.92H204c18.69,0,30.92,9.74,30.92,27.52v0.45c0,19-13.82,28.09-31.14,28.31h-7.81v23H175.67V87.92Zm27.41,39.64c7.13,0,11.44-4.19,11.44-10.87v-0.34c0-7.25-4.19-11-11.55-11h-7v22.2h7.13Z" class="fill-current text-white"></path><path d="M267.17,87.47h20.61l28,79.73h-21.4l-4.64-14.27H264.8l-4.53,14.27h-21Zm17.44,49.15-7.36-23.22-7.36,23.22h14.72Z" class="fill-current text-white"></path><path d="M338.64,106.27H319V87.92h59.57v18.35H359V167.2H338.64V106.27Z" class="fill-current text-white"></path><path d="M396.17,87.92h20.39V167.2H396.17V87.92Z" class="fill-current text-white"></path><path d="M444.64,87.92h54.59v17.89H464.8v13h31v16.88h-31V149.3h34.88V167.2h-55V87.92Z" class="fill-current text-white"></path></g></svg>
            </a>
            <ul class="flex space-x-8">
                <li><a class="text-white opacity-25 hover:opacity-50 transition-opacity duration-200" href="">Disclaimer</a></li>
                <li><a class="text-white opacity-25 hover:opacity-50 transition-opacity duration-200" href="">Terms & Conditions</a></li>
            </ul>

        </nav>
    </footer>
    
    @include('partials.newsletter-feedback')



@endsection
