<?php

namespace App\Http\Front\Controllers;

class VideosController
{
    public function __invoke(string $slug)
    {
        $videos = [
            'readonly-properties' => ['id' => '609789995', 'title' => 'Readonly Properties'],
            'enums' => ['id' => '609789289', 'title' => 'Enums'],
            'array-spreading' => ['id' => '609789845', 'title' => 'Improvements to Array Spreading'],
            'first-class-callables' => ['id' => '617766740', 'title' => 'First-class Callables'],
            'intersection-types' => ['id' => '617766993', 'title' => 'Intersection Types'],
            'the-never-type' => ['id' => '617767331', 'title' => 'The Never Type'],
        ];

        $video = $videos[$slug] ?? null;

        abort_if($video === null, 404);

        return view('front.videos.index', $video);
    }
}
