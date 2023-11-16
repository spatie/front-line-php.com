@extends('partials.cta')

@section('cta_body')
    <h2 class="text-6xl font-display mb-8 leading-none text-white text-opacity-90">
        Front Line PHP
    </h2>
    <div class="block text-xl md:text-2xl font-semibold leading-relaxed text-white text-opacity-90">
        Want to learn more about modern PHP?
        Pick up Front Line PHP, An ebook on cutting edge tactics in PHP 8.3, accompanied by videos and practical examples.
    </div>

    <div class="flex justify-end">
        <div class="flex flex-col items-end">
            <a href="/">
                <x-button icon="fas fa-play" :large="true" :primary=true>
                    Learn more
                </x-button>
            </a>
        </div>
    </div>

@endsection
