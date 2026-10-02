<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

it('serves pages and keeps the session without a database', function () {
    config()->set('database.connections.sqlite.database', '/non-existent/database.sqlite');
    config()->set('session.driver', 'cookie');
    config()->set('cache.default', 'file');
    config()->set('services.spatie_prices_api.purchasable_id', 17);

    DB::purge();

    Http::preventStrayRequests();
    Http::fake(['spatie.be/api/price/*' => Http::response(status: 500)]);

    $this->get('/?referrer=newsletter')->assertOk();

    $this->get('/cheat-sheet')
        ->assertOk()
        ->assertSessionHas('referrer', 'newsletter');

    $this->get('/up')->assertOk();
});
