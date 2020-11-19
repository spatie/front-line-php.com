@extends('partials.cta')

@section('cta_body')
    <h2 class="text-6xl font-display mb-8 leading-none text-white text-opacity-90">
        Walk up front
    </h2>
    <div class="block text-xl font-semibold leading-relaxed text-white text-opacity-90">
        You've just read part of our upcoming book called <a href="https://front-line-php.com">Front Line PHP</a>, it'll arrive by the end of this year and be the best way to learn modern day PHP and PHP 8.
        <br><br>
        Interested? You can leave your email address here, and we'll notify you when it's done.
    </div>

    @include('partials.newsletter')
@endsection
