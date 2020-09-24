<footer class="bg-black pt-32 pb-8">
    <img src="/images/footer.jpg" class="absolute top-0 left-0 w-full h-full object-cover opacity-20">
    <nav class="flex items-end justify-between mx-auto max-w-5xl px-4 sm:px-16">
        <a href="https://spatie.be" class="h-8 inline-block">
            @include('partials.logo')            
        </a>
        <ul class="flex space-x-8">
            <li><a class="text-white opacity-25 hover:opacity-50 transition-opacity duration-200" href="{{ route('privacy') }}">Privacy</a></li>
            <li><a class="text-white opacity-25 hover:opacity-50 transition-opacity duration-200" href="{{ route('termsOfUse') }}">Terms of Use</a></li>
        </ul>
    </nav>
</footer>