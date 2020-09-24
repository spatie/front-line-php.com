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
            Subcribe
        </button>
    </div>
</form>