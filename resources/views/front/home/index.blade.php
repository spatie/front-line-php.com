@extends('front.layouts.master')

@section('title', 'Building modern web applications with PHP 8.3')

@section('description', 'Building modern web applications with PHP 8.3 by Brent Roose, accompanied by videos by Freek Van der Herten.')

@section('content')

<header>
    <div class="h-32">
        @include('partials.header')
    </div>

    <div class="mx-auto max-w-5xl cursor-pointer px-4 sm:px-16 py-16">
        <div x-data="{
            scroll: () => {
                window.scrollTo({
                    top: document.getElementById('update81').getBoundingClientRect().top - 50,
                    left: 0,
                    behavior: 'smooth'
                  });
            }
        }"
        class="absolute left-0 top-0 ml-4 sm:ml-16 -mt-5 bg-yellow-500 px-8 py-2 font-bold whitespace-no-wrap text-xl">
            <a href="#/" @click="scroll">Revised for PHP 8.3</a>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="md:pr-12">
                <h1 class="font-display text-5xl md:text-6xl lg:text-7xl leading-none">
                    Front Line PHP
                </h1>
                <p class="mt-2 font-semibold text-3xl sm:text-4xl md:text-3xl lg:text-4xl leading-snug">
                    Building modern applications
                    <br>
                    with PHP 8.3
                </p>
            </div>

            <div class="md:-mt-24 lg:-mt-24 pt-2">
            @include('partials.priceCard')
            </div>
        </div>
    </div>

</header>

<main   class="mx-auto max-w-5xl px-4 sm:px-16 mt-16" style="background-image: linear-gradient(to top, #fff 20%, #daf1f5)">

    <section id="update81" class="mt-48 mb-32 relative">
        <div class="-mt-24 pt-2">
            @include('partials.updateCard')
        </div>
    </section>

    <section class="grid md:grid-cols-2 gap-8">
        <div class="">
            <a class="block" href="{{ route('object-oriented') }}">
                <img alt="Front Line PHP" srcset="/images/cover-1200.jpg 1200w, /images/cover-600.jpg 600w" sizes="500px, (min-width:768px) 45vw" src="/images/cover-1200.jpg" class="mx-auto w-full max-w-xl shadow-2xl">
                <div class="absolute top-0 w-full flex justify-center -mt-6">
                    <x-button icon="fas fa-play">
                        Read sample
                    </x-button>
                </div>
            </a>
        </div>

        <div class="pb-16" x-data="{ open: false }">
            <div class="w-full bg-black group cursor-hand" @click="open = true">
                <img srcset="/images/intro-1600.jpg 1600w, /images/intro-800.jpg 800w" sizes="100vw, (min-width:768px) 45vw" src="/images/intro-1600.jpg" class="w-full opacity-100 group-hover:opacity-75 transition-opacity duration-300" alt="Video still">
                <div class="absolute -mt-6 top-0 w-full flex items-center justify-center">
                    <x-button icon="fas fa-play">
                        Watch intro
                    </x-button>
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
                    An <span class="marker">ebook</span> on cutting edge tactics in PHP 8.3, accompanied by <span class="marker">videos</span> and practical examples.
                </p>

                <p class="mt-12 text-xl font-semibold markup-links leading-relaxed">
                    Brought to you by open source veterans <a href="https://twitter.com/brendt_gd">Brent Roose</a>, and <a href="https://twitter.com/freekmurze">Freek Van der Herten</a> from <a class="bg-none" href="{{spatieUrl('https://spatie.be')}}">Spatie</a>.
                </p>
            </div>
        </div>
    </section>

    <section class="mb-24">
        <div class="mb-8 bg-white" >
            <h3 class="px-6 md:px-12 lg:px-24 pt-12 lg:pt-24 text-base">
                <div class="text-3xl font-display leading-none" :class="">Foreword</div>
                By <a href="https://twitter.com/pronskiy" class="markup-link">Roman Pronskiy</a> from <a href="https://www.jetbrains.com" class="markup-link">JetBrains</a>
            </h3>

            <div class="markup" x-data="{ open: false }">
                <div class="px-6 md:px-12 lg:px-24 py-12 text-lg" :class="{ 'h-64 overflow-hidden': !open}">
                    <p>PHP has changed the world. More than 5 million developers are now using this language worldwide to create a variety of applications. But the world is changing PHP as well. Rasmus Lerdorf, the creator of the language, once noted that <q class="italic">a good solution should steal/borrow existing technology</q>. And this is true. PHP takes the best ideas from other ecosystems and improves on them.</p>
                    <p>It's been 5 years since the release of PHP 7.0. In this time, as the community has matured and needed new features, the language team has been listening to the community and implementing the features. This is what has led PHP to introduce stricter typing, more concise syntax, static analyzers, etc.</p>
                    <p><q class="italic">It is not the strongest of the species that survives, nor the most intelligent that survives. It is the one that is most adaptable to change.</q> - Leon C. Megginson’s interpretation of Darwin’s ideas is an insight that guides PHP year after year.</p>
                    <p>I was still in school when I first saw PHP, and at the time I had no idea that I would go on to work with it professionally. Back then, in 2004, the main problem the internet had was searching for information. Today, because so much information is readily available, the problem is not searching information but filtering and identifying what is useful. It is, to lean on an old cliché, like looking for a $needle in a $haystack – or was it the other way around? Anyway, how do we dig up the really valuable things in these endless feeds mixed with ads and notifications?</p>
                    <p>It's impossible to give a comprehensive answer for all areas, but for PHP the answer is here – Front Line PHP.</p>
                    <p>This book gives a core of knowledge about everything that concerns the PHP’s development today and in the near future. This is not a paraphrase of documentation, but rather a thoughtful and meaningful development experience in short and clear formulations. It offers a fresh look at the newest features of the language, as well as at some that are already familiar.</p>
                    <p>Writing quality code in PHP has simultaneously become both easier and more complicated. On the one hand, there are many new features and tools at a developer's disposal. On the other hand, you need to juggle them elegantly in order to solve real problems beautifully and easily.</p>
                    <p>That’s what this book is really about. Complex things in simple words. How to apply them. Principles and practices. It is a fishing rod, in a sea full of fish.</p>
                    <p  class="font-semibold">
                    There has never been a better time to work with PHP.
                    And this book is one of the best ways to learn it.</p>
                    <p>I hope you enjoy it!<br>

                    <span class="marker">Roman Pronskiy</span></p>
                </div>

                <div x-show="!open" style="background-image: linear-gradient(to top, #ffffffff, #ffffff00)" class="absolute bottom-0 left-0 w-full h-32">
                </div>

                <div class="absolute -mb-4 bottom-0 left-0 w-full flex justify-center">
                    <button x-show="!open" class="button" @click="open = true">
                        read more
                    </button>
                </div>
            </div>

        </div>
    </section>

    <section class="mb-24" id="toc">
        <h2 class="font-display text-3xl sm:text-4xl md:text-5xl leading-none ">Table of contents</h2>

        <div class="mt-8 grid md:grid-cols-3 gap-8 markup-links">
            <div>
                <h3 class="font-semibold text-xl">
                    <div class="text-3xl font-display leading-none">Part I</div>
                    PHP, the Language
                </h3>

                <ol class="grid gap-2 text-lg md:text-base mt-6 list-decimal pl-12 border-l-2 border-black leading-tight">
                    <li>PHP Today</li>
                    <li>New Versions</li>
                    <li><a href="{{ route('dealing-with-null') }}">PHP's Type System</a></li>
                    <li>Static Analysis</li>
                    <li>Property Promotion</li>
                    <li>Readonly Properties <x-tag>8.1</x-tag></li>
                    <li>Named Arguments</li>
                    <li>Attributes</li>
                    <li>Enums <x-tag>8.1</x-tag></li>
                    <li>Short Closures</li>
                    <li>First-Class Callables <x-tag>8.1</x-tag></li>
                    <li>Working With Arrays</li>
                    <li>Match</li>
                    <li>New in Initializers <x-tag>8.1</x-tag></li>
                </ol>
            </div>

            <div>
                <h3 class="font-semibold text-xl">
                    <div class="text-3xl font-display leading-none">Part II</div>
                    Building With PHP
                </h3>

                <ol start=15 class="grid gap-2 text-lg md:text-base mt-6 list-decimal pl-12 border-l-2 border-black leading-tight">
                    <li><a href="{{ route('object-oriented') }}">Object Oriented PHP</a></li>
                    <li>MVC Frameworks</li>
                    <li>Dependency Injection</li>
                    <li>Collections</li>
                    <li>Testing</li>
                    <li>Style guide</li>
                </ol>
            </div>

            <div>
                <h3 class="font-semibold text-xl">
                    <div class="text-3xl font-display leading-none">Part III</div>
                    PHP In Depth
                </h3>

                <ol start=21 class="grid gap-2 text-lg md:text-base mt-6 list-decimal pl-12 border-l-2 border-black leading-tight">
                    <li>The JIT</li>
                    <li>Preloading</li>
                    <li>FFI</li>
                    <li>Internals</li>
                    <li>Type Variance</li>
                    <li>Async PHP</li>
                    <li>Fibers <x-tag>8.1</x-tag></li>
                    <li>Event driven development</li>
                    <li>Static Analysers in Practice</li>
                    <li>PHP 8.2</li>
                    <li>PHP 8.3 <x-tag>New</x-tag></li>
                    <li><a href="{{ route('cheat-sheet') }}">Cheat Sheet</a></li>
                </ol>
            </div>

        </div>
    </section>

    <section class="mb-24" id="videos">
        <h2 class="font-display text-3xl sm:text-4xl md:text-5xl leading-none">Free videos</h2>

        <div class="mt-8 grid md:grid-cols-2 gap-8 markup-links">
            <div>
                <h3 class="font-semibold text-xl">
                    <div class="text-3xl font-display leading-none">New features in PHP 8</div>
                </h3>

                <ol class="grid gap-2 text-lg md:text-base mt-6 list-decimal pl-12 border-l-2 border-black leading-tight">
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/the-match-expression') }}">The Match Expression</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/named-arguments') }}">Named Arguments</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/adding-meta-data-using-attributes') }}">Adding Meta Data using Attributes</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/promoted-properties') }}">Promoted Properties</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/union-types') }}">Union Types</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/the-nullsafe-operator') }}">The Nullsafe Operator</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/improved-exceptions') }}">Improved Exceptions</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/object-classnames') }}">Object Classnames</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/the-stringable-interface') }}">The Stringable Interface</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/three-new-string-functions') }}">Three New String Functions</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/exploring-weakmaps') }}">Exploring WeakMaps</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/trailing-commas-in-function-definitions') }}">Trailing Commas in Function Definitions</a></li>
                </ol>
            </div>

            <div>
                <h3 class="font-semibold text-xl">
                    <div class="text-3xl font-display leading-none">Getting started with PHP 8</div>
                </h3>

                <ol start=13 class="grid gap-2 text-lg md:text-base mt-6 list-decimal pl-12 border-l-2 border-black leading-tight">
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/automatically-upgrading-your-code-to-php-8-using-rector') }}">Automatically upgrading your code to PHP 8 using Rector</a></li>
                </ol>

                <h3 class="mt-8 font-semibold text-xl">
                    <div class="text-3xl font-display leading-none">New Features in PHP 8.1</div>
                </h3>
                <ol start=14 class="grid gap-2 text-lg md:text-base mt-6 list-decimal pl-12 border-l-2 border-black leading-tight">
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/readonly-properties') }}">Readonly Properties</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/enums') }}">Enums</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/improvements-to-array-spreading') }}">Improvements to Array Spreading</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/first-class-callables') }}">First-class Callables</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/intersection-types') }}">Intersection Types</a></li>
                    <li><a href="{{ spatieUrl('https://spatie.be/courses/front-line-php/the-never-type') }}">The Never Type</a></li>


                </ol>
            </div>

        </div>
    </section>

    <section class="mt-24 mb-24">
            <h3 class="text-3xl text-center font-display leading-none font-semibold text-xl">
                Related resources
            </h3>

            <div class="mt-8 layout grid md:grid-cols-4 gap-x-20 gap-y-10">
                <a href="https://testing-laravel.com/" class="group max-w-xs  markup-links ">
                    <div
                        class="transform transition-transform duration-150 group-hover:shadow-2xl group-hover:-translate-y-1 shadow-lg bg-white p-4">
                        <img width="750 " height="900" alt="Testing Laravel " src="images/testing-laravel.jpg">
                    </div>
                    <div class="pt-6 px-2 text-xs">
                        <p class="leading-relaxed">
                            A new video course to learn how to write quality tests in Pest and PHPUnit
                        </p>
                        <p class="mt-2">
                            <span class="markup-link-hover markup-link  font-semibold">testing-laravel.com</span>
                        </p>
                    </div>
                </a>
                <a href="https://event-sourcing-laravel.com"  class="group max-w-xs markup-links">
                    <div
                        class="transform transition-transform duration-150 group-hover:shadow-2xl group-hover:-translate-y-1 shadow-lg bg-white p-4">
                        <img width="750 " height="900" alt="Front Line PHP" src="images/event-sourcing.jpg">
                    </div>
                    <div class="pt-6 px-2 text-xs">
                        <p class="leading-relaxed">
                            Learn how to implement Event Sourcing in large Laravel applications in this extended course by Brent.
                        </p>
                        <p class="mt-2">
                            <span class="markup-link-hover  markup-link  font-semibold">event-sourcing-laravel.com</span>
                        </p>
                    </div>
                </a>
                <a href="https://laravel-beyond-crud.com" class="group max-w-xs markup-links">
                    <div
                        class="transform transition-transform duration-150 group-hover:shadow-2xl group-hover:-translate-y-1 shadow-lg bg-white p-4">
                        <img width="750 " height="900" alt="Laravel Beyond Crud" src="images/crud.jpg">
                    </div>
                    <div class="pt-6 px-2 text-xs">
                        <p class="leading-relaxed">
                            Learn how to build larger-than-average Laravel applications and maintain them for years to
                            come.
                        </p>
                        <p class="mt-2">
                            <span class="markup-link-hover  markup-link  font-semibold">laravel-beyond-crud.com</span>
                        </p>
                    </div>
                </a>


                <a href="https://laravelpackage.training" class="group max-w-xs markup-links">
                    <div
                        class="transform transition-transform duration-150 group-hover:shadow-2xl group-hover:-translate-y-1 shadow-lg bg-white p-4">
                        <img width="750 " height="900" alt="Laravel package Training" src="images/packagetraining.jpg">
                    </div>
                    <div class="pt-6 px-2 text-xs">
                        <p class="leading-relaxed">
                            Watch how to create a Laravel package and become the next package maestro.
                        </p>
                        <p class="mt-2">
                            <span class="markup-link-hover  markup-link  font-semibold">laravelpackage.training</span>
                        </p>
                    </div>
                </a>

            </div>
        </section>

    @include('partials.cta-promo')
</main>

@include('partials.footer')

@endsection
