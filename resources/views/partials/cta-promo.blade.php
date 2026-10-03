@extends('partials.cta')

@section('cta_body')

    <div x-data="spatiePrice({{ config('services.spatie_prices_api.purchasable_id') }})" x-init="init()">
        <div x-show="discount.active" style="display: none">
            <h2 class="text-6xl font-display mb-8 leading-none text-white text-opacity-90" x-text="discount.name"></h2>
            <div class="block text-xl md:text-2xl font-semibold leading-relaxed text-white text-opacity-90">
                Get <span x-text="discount.percentage"></span>% off on the entire ebook for the next
                <div>
                    <div class="font-sans font-normal px-1 py-1" style="font-variant-numeric:tabular-nums">
                        <span class="font-bold bg-white bg-opacity-25 px-1"><span x-text="countdown.days"></span> <span class="font-semibold text-white text-opacity-75">days</span></span>
                        <span class="font-bold bg-white bg-opacity-25 px-1"><span x-text="countdown.hours"></span> <span class="font-semibold text-white text-opacity-75">hours</span></span>
                        <span class="font-bold bg-white bg-opacity-25 px-1"><span x-text="countdown.minutes"></span> <span class="font-semibold text-white text-opacity-75">minutes</span></span>
                        <span class="font-bold bg-white bg-opacity-25 px-1"><span x-text="countdown.seconds"></span> <span class="font-semibold text-white text-opacity-75">seconds</span></span>
                    </div>
                </div>
            </div>
        </div>
        <div x-show="! discount.active">
            <h2 class="text-6xl font-display mb-8 leading-none text-white text-opacity-90">
                Front Line PHP
            </h2>
            <div class="block text-xl md:text-2xl font-semibold leading-relaxed text-white text-opacity-90">
                Building modern applications with PHP 8.3
            </div>
        </div>
    </div>

    <div class="flex justify-end">
        <div class="flex flex-col items-end">
            <a href="{{ spatieUrl('https://spatie.be/products/front-line-php') }}">
                <x-button icon="fas fa-play" :large="true" :primary=true>
                    Buy Ebook
                </x-button>
            </a>
        </div>
    </div>

@endsection
