@extends('front.layouts.video')

@section('title', $title)

@section('description', $description)

@section('footer_cta')
    @include('partials.cta-video')
@endsection

@section('video')
    <main class="mx-auto max-w-article px-4 sm:px-16">
        <article class="pb-4 markup markup-links markup-lists markup-code markup-tables">
            {{ $description }}
        </article>
    </main>

    <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/{{ $id }}?h=82d9b268c0&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="{{ $title }}"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
@endsection
