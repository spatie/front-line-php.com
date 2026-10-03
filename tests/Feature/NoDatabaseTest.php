<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

it('serves pages without a database', function () {
    config()->set('database.connections.sqlite.database', '/non-existent/database.sqlite');
    config()->set('cache.default', 'file');
    config()->set('services.spatie_prices_api.purchasable_id', 17);

    DB::purge();

    Http::preventStrayRequests();

    $this->get('/?referrer=newsletter')->assertOk();

    $this->get('/cheat-sheet')->assertOk();

    $this->get('/up')->assertOk();
});
