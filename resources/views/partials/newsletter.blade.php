<form action="{{ action(\App\Http\Front\Controllers\SubscribeToEmailListController::class) }}"
    method="post"
    accept-charset="utf-8"
    class="flex mt-12 bg-white"
>
    @csrf
    @honeypot

    <input type="email" id="email" name="email" aria-label="Email" required placeholder="Email" class="input flex-grow px-3 text-lg">
    <div class="moving-button">
        <button type="submit" class="button">
            Subscribe
        </button>
    </div>
</form>

<div class="mt-2 text-sm text-white opacity-50">
    No spam — we won't sell your email.
</div>

<div x-data="{ open: true }" x-show="open">       
    @if(flash()->message)
        <div class="fixed z-50 fix-z top-0 left-0 h-16 w-full flex items-center justify-center py-8 bg-green-500 border-b border-black border-opacity-50 shadow-xl {{ flash()->class }} md:text-xl text-white text-center">
            <img src="/images/footer.jpg" class="absolute top-0 left-0 w-full h-full object-cover opacity-20">
            <span>{{ flash()->message }}</span>

            <button @click="open = false" class="p-4 opacity-50">&times;</button>
        </div>
    @endif
</div>