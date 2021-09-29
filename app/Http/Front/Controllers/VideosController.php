<?php

namespace App\Http\Front\Controllers;

class VideosController
{
    public function __invoke(string $slug)
    {
        $videos = [
            '609789995-readonly-properties' => [
                'id' => '609789995',
                'title' => 'New in PHP 8.1: Readonly Properties',
                'description' => 'Readonly properties add a convenient way to create immutable data objects in PHP 8.1.',
            ],
            '609789289-enums' => [
                'id' => '609789289',
                'title' => 'New in PHP 8.1: Enums',
                'description' => 'Enums are finally natively supported in PHP 8.1.',
            ],
            '609789845-array-spreading' => [
                'id' => '609789845',
                'title' => 'New in PHP 8.1: Improvements to Array Spreading',
                'description' => 'PHP 8.1 adds extra functionality to array spreading.',
            ],
            '617766740-first-class-callables' => [
                'id' => '617766740',
                'title' => 'New in PHP 8.1: First-class Callables',
                'description' => 'First-class callables are a new way of referencing callables in PHP 8.1.',
            ],
            '617766993-intersection-types' => [
                'id' => '617766993',
                'title' => 'New in PHP 8.1: Intersection Types',
                'description' => 'Intersection types allow you to combine interfaces on the fly in PHP 8.1.',
            ],
            '617767331-the-never-type' => [
                'id' => '617767331',
                'title' => 'New in PHP 8.1: The Never Type',
                'description' => 'PHP 8.1 adds a new "never" type.',
            ],
        ];

        $video = $videos[$slug] ?? null;

        abort_if($video === null, 404);

        return view('front.videos.index', $video);
    }
}
