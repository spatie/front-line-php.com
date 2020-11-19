@php
$coupon = \App\Support\Coupon::forCouponName('default')
@endphp

@extends('partials.cta')

@section('cta_body')
<h2 class="text-6xl font-display mb-8 leading-none text-white text-opacity-90">
    {{ $coupon->label() }}
</h2>
<div class="block text-xl md:text-2xl font-semibold leading-relaxed text-white text-opacity-90">
    Get {{ $coupon->percentage() }}% off on the entire ebook for the next
    @if($coupon->active())
    <div>
        <div class="font-sans font-normal px-1 py-1" style="font-variant-numeric:tabular-nums">
            <x-countdown :expires="$coupon->expiresAt()">
                <span class="font-bold bg-white bg-opacity-25 px-1"><span x-text="timer.days">{{ $component->days() }}</span> <span class="font-semibold text-white text-opacity-75">days</span></span>
                <span class="font-bold bg-white bg-opacity-25 px-1"><span x-text="timer.hours">{{ $component->hours() }}</span> <span class="font-semibold text-white text-opacity-75">hours</span></span>
                <span class="font-bold bg-white bg-opacity-25 px-1"><span x-text="timer.minutes">{{ $component->minutes() }}</span> <span class="font-semibold text-white text-opacity-75">minutes</span></span>
                <span class="font-bold bg-white bg-opacity-25 px-1"><span x-text="timer.seconds">{{ $component->seconds() }}</span> <span class="font-semibold text-white text-opacity-75">seconds</span></span>
            </x-countdown>
        </div>
    </div>
    @endif
</div>

<div class="flex justify-end">
    <div class="flex flex-col items-end">
        <a href="https://spatie.be/products/front-line-php">
            <x-button icon="fas fa-play" :large="true" :primary=true>
                Buy Ebook
            </x-button>
        </a>
        @if ($coupon->active())
        <div class="mt-4 text-white text-xs">
            Use coupon <code class="opacity-75">{{ $coupon->code() }}</code> during checkout
        </div>
        @endif
    </div>
</div>

@endsection
