<?php

function spatieUrl(string $url = 'https://spatie.be'): string
{
    if ($referrer = session()->get('referrer')) {
        return "{$url}?referrer={$referrer}";
    }

    return $url;
}
