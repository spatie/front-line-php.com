@php
    $coupon = \App\Support\Coupon::forCouponName('default')
@endphp

<section class="flex justify-center">
    <div class="max-w-xl w-full">
        <div class="z-10 flex-grow shadow-2xl">
            <div class="bg-yellow-500 -mt-px h-6"></div>
            <div class="bg-white">
                <div class="text-center pt-4 pb-12 leading-none">
                    <div class="font-display font-semibold text-3xl">
                        @if($coupon->active())
                            <div
                                class="flex flex-col items-center mb-6 text-center text-gray-700  text-xs leading-snug">
                                <div>{{ $coupon->label() }} ending in</div>
                                <div
                                    class="bg-blue-200 z-10 transform rotate-0 font-sans font-normal text-black text-opacity-75 px-1 py-1"
                                    style="--transform-rotate: -1.5deg !important; font-variant-numeric:tabular-nums">
                                    <x-countdown :expires="$coupon->expiresAt()">
                                        <span class="font-bold bg-white bg-opacity-25 px-1"><span
                                                x-text="timer.days">{{ $component->days() }}</span> <span class="font-semibold text-black text-opacity-75">days</span></span>
                                        <span class="font-bold bg-white bg-opacity-25 px-1"><span
                                                x-text="timer.hours">{{ $component->hours() }}</span> <span class="font-semibold text-black text-opacity-75">hours</span></span>
                                        <span class="font-bold bg-white bg-opacity-25 px-1"><span
                                                x-text="timer.minutes">{{ $component->minutes() }}</span> <span class="font-semibold text-black text-opacity-75">minutes</span></span>
                                        <span class="font-bold bg-white bg-opacity-25 px-1"><span
                                                x-text="timer.seconds">{{ $component->seconds() }}</span> <span class="font-semibold text-black text-opacity-75">seconds</span></span>
                                    </x-countdown>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="flex justify-center mt-4">
                        <div>
                            <sup class="text-gray-500 text-3xl" data-id="current-currency-{{ config('services.paddle.product_id') }}"></sup><span
                                class="font-bold text-5xl" data-id="current-price-{{ config('services.paddle.product_id') }}">—</span>
                            <span data-id="original-display-{{ config('services.paddle.product_id') }}" class="hidden absolute right-full mr-4 top-0 mt-2">
                                <sup class="text-gray-500 text-xs" data-id="original-currency-{{ config('services.paddle.product_id') }}"></sup><span
                                    class="text-gray-500 line-through" data-id="original-price-{{ config('services.paddle.product_id') }}">—</span>
                            </span>
                        </div>
                    </div>

                     @if ($coupon->active())
                        <div class="mt-4 text-gray-500 text-xs">
                            {{ $coupon->percentage() }}% off with coupon <code class="px-2 py-1 text-gray-700 bg-gray-100">{{ $coupon->code() }}</code>
                        </div>
                    @endif
                </div>
                <div class="text-center z-10 -mt-3 -mb-3">
                    <a href="https://spatie.be/products/front-line-php">
                        <x-button icon="fas fa-play" :primary=true>
                            Buy Ebook
                        </x-button>
                    </a>
                </div>
                <div class="pt-12 pb-10 px-12 flex justify-center bg-gray-100">
                    <div>
                        <ul class="pb-6 leading-relaxed">
                            <li class="font-semibold"><i class="fas fa-check text-xs text-blue-500"></i> 250 pages of premium content</li>
                            <li><i class="fas fa-check text-xs text-blue-500"></i> More than a dozen <a class="markup-link font-semibold" href="https://spatie.be/videos/front-line-php">free videos</a></li>
                            <li><i class="fas fa-check text-xs text-blue-500"></i> A free <a class="markup-link font-semibold" href="{{ route("cheat-sheet") }}">cheat sheet</a></li>
                            <li><i class="fas fa-check text-xs text-blue-500"></i> All beautifully designed</li>
                        </ul>

                        <p class="text-xs text-gray-600">
                            Prices exclusive of VAT for buyers without a valid VAT number.
                            <br>
                            We use purchasing power parity provided by Paddle.
                            <br>
                            <a class="underline" href="mailto:info@spatie.be?subject=CRUD%20for%20students">Contact us</a> if your currency is <a class="underline" target="_blank" href="https://paddle.com/support/what-currencies-do-you-support/">not supported</a> or if you are a student.
                        </p>
                    </div>
                </div>
            </div>
        </div>
</section>

<script type="text/javascript">
    function indexOfFirstDigitInString(string) {
        let firstDigit = string.match(/\d/);

        return string.indexOf(firstDigit);
    }

    function displayPaddleProductPrice(productId) {
        Paddle.Product.Prices(productId, function(prices) {
            let priceString = prices.price.net;

            let factor = {{ $coupon->active() ? (100 - $coupon->percentage())/100 : 1 }};

            let indexOFirstDigitInString = indexOfFirstDigitInString(priceString);

            let price = priceString.substring(indexOFirstDigitInString);
            price = price.replace('.00', '').replace(/,/g, '');

            let currencySymbol = priceString.substring(0, indexOFirstDigitInString);
            currencySymbol = currencySymbol.replace('US', '');

            document.querySelector(`[data-id="original-currency-${productId}"]`).innerHTML = currencySymbol;
            document.querySelector(`[data-id="original-price-${productId}"]`).innerHTML = price;

            document.querySelector(`[data-id="current-currency-${productId}"]`).innerHTML = currencySymbol;
            document.querySelector(`[data-id="current-price-${productId}"]`).innerHTML = Math.ceil(price * factor);
            
            if(factor < 1) {
                document.querySelector(`[data-id="original-display-${productId}"]`).classList.remove('hidden');
            }
        });
    }

    displayPaddleProductPrice({{ config('services.paddle.product_id') }});

</script>
