@use('App\Http\Front\Controllers\SubscribeToEmailListController')
<p class="w-full mt-4">
    <span class="font-semibold">Subscribe now</span> and get a video on a modern feature every day: learn about enums, readonly properties, and much more.
</p>

<form action="{{ action(SubscribeToEmailListController::class) }}"
    method="post"
    accept-charset="utf-8"
    class="flex flex-wrap sm:flex-no-wrap mt-4 w-full bg-white"
>
    @honeypot

    <input type="email" id="email" name="email" aria-label="Email" required placeholder="Email" class="input flex-auto px-3 text-lg">
    <div class="w-full sm:w-auto text-center">
        <button type="submit" class="button bg-yellow-500 w-full justify-center text-black">
            Subscribe
        </button>
    </div>
</form>


<div x-data="{ open: true }" x-show="open">
    @if(($subscribed ?? false) || ($subscriptionFailed ?? false))
        <div class="fixed z-50 fix-z top-0 left-0 h-16 w-full flex items-center justify-center py-8 px-4 bg-green-500 border-b border-black border-opacity-50 shadow-xl md:text-xl text-white text-center">
            <img srcset="{{ asset('images/footer-2400.webp') }} 2400w, {{ asset('images/footer-1200.webp') }} 1200w" sizes="100vw" src="{{ asset('images/footer-2400.webp') }}" class="absolute top-0 left-0 w-full h-full object-cover opacity-20">
            @if($subscribed ?? false)
                <span>You've been successfully subscribed, you can expect the first video to arrive in your mailbox within a few minutes.</span>
            @else
                <span>We could not subscribe you. Please check your email address and try again.</span>
            @endif

            <a href="#" @click="open = false" class="p-4 opacity-50 hover:opacity-75">&times;</a>
        </div>
    @endif
</div>
