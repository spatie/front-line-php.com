<?php

use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::preventStrayRequests();

    config()->set('services.spatie_prices_api.purchasable_id', 17);
});

it('shows the home page without fetching prices on the server', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('Building modern web applications with PHP 8.3')
        ->assertSee('Buy Ebook')
        ->assertSee('x-data="spatiePrice(17)"', false)
        ->assertSee('window.spatiePrice', false)
        ->assertSee('countdown.days', false)
        ->assertSee('https://spatie.be/products/front-line-php', false);

    Http::assertNothingSent();
});

it('does not add the referrer to the buy links on the server', function () {
    $this->get('/?referrer=newsletter')
        ->assertOk()
        ->assertDontSee('?referrer=newsletter', false)
        ->assertSee('referrer=', false);
});

it('confirms a newsletter subscription', function () {
    $this->get('/?subscribed=1')
        ->assertOk()
        ->assertSee("You've been successfully subscribed, you can expect the first video to arrive in your mailbox within a few minutes.", false)
        ->assertDontSee('We could not subscribe you.');
});

it('shows that a subscription failed', function () {
    $this->get('/?subscription-failed=1')
        ->assertOk()
        ->assertSee('We could not subscribe you.')
        ->assertDontSee("You've been successfully subscribed", false);
});

it('does not show subscription messages by default', function () {
    $this->get('/')
        ->assertDontSee("You've been successfully subscribed", false)
        ->assertDontSee('We could not subscribe you.');
});

it('serves robots.txt', function () {
    $this->get('/robots.txt')
        ->assertOk()
        ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
        ->assertSee('User-agent: *');
});

it('shows the static pages', function (string $url, string $text) {
    $this->get($url)->assertOk()->assertSee($text);

    Http::assertNothingSent();
})->with([
    ['/cheat-sheet', 'Modern PHP Cheat Sheet'],
    ['/object-oriented', 'Object Oriented Done Right'],
    ['/dealing-with-null', 'Dealing with null'],
    ['/terms-of-use', 'Terms of use'],
    ['/privacy', 'Privacy and cookie policy'],
]);

it('renders the promo price on the content pages', function (string $url) {
    $this->get($url)
        ->assertOk()
        ->assertSee('x-data="spatiePrice(17)"', false)
        ->assertSee('Building modern applications with PHP 8.3');
})->with([
    '/cheat-sheet',
    '/object-oriented',
    '/dealing-with-null',
]);

it('shows a video', function () {
    $this->get('/videos/609789289-enums')
        ->assertOk()
        ->assertSee('New in PHP 8.2: Enums')
        ->assertSee('player.vimeo.com/video/609789289', false);
});

it('returns a 404 for an unknown video', function () {
    $this->get('/videos/unknown')->assertNotFound();
});
