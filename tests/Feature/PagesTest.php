<?php

use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::preventStrayRequests();

    config()->set('services.spatie_prices_api.purchasable_id', 17);
});

function fakePriceApi(bool $discountActive = false): void
{
    Http::fake([
        'spatie.be/api/price/*' => Http::response([
            'actual' => ['price_in_cents' => 3430, 'currency_code' => 'EUR', 'currency_symbol' => '€', 'formatted_price' => '€ 34.30'],
            'without_discount' => ['price_in_cents' => 4900, 'currency_code' => 'EUR', 'currency_symbol' => '€', 'formatted_price' => '€ 49'],
            'discount' => ['active' => $discountActive, 'percentage' => 30, 'name' => 'BLACK FRIDAY', 'expires_at' => now()->addDays(3)->timestamp],
        ]),
    ]);
}

it('shows the home page with the price', function () {
    fakePriceApi();

    $this->get('/')
        ->assertOk()
        ->assertSee('Building modern web applications with PHP 8.3')
        ->assertSee('Buy Ebook')
        ->assertSee('34.30')
        ->assertDontSee('ending in');
});

it('shows a countdown when a discount is active', function () {
    fakePriceApi(discountActive: true);

    $this->get('/')
        ->assertOk()
        ->assertSee('BLACK FRIDAY ending in')
        ->assertSee('timer.days', false);
});

it('shows the home page when the price cannot be fetched', function () {
    Http::fake(['spatie.be/api/price/*' => Http::response(status: 500)]);

    $this->get('/')
        ->assertOk()
        ->assertSee('Buy Ebook');
});

it('remembers the referrer in the buy links', function () {
    fakePriceApi();

    $this->get('/?referrer=newsletter')
        ->assertOk()
        ->assertSee('https://spatie.be/products/front-line-php?referrer=newsletter');
});

it('shows the static pages', function (string $url, string $text) {
    fakePriceApi();

    $this->get($url)->assertOk()->assertSee($text);
})->with([
    ['/cheat-sheet', 'Modern PHP Cheat Sheet'],
    ['/object-oriented', 'Object Oriented Done Right'],
    ['/dealing-with-null', 'Dealing with null'],
    ['/terms-of-use', 'Terms of use'],
    ['/privacy', 'Privacy and cookie policy'],
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
