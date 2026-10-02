<?php

use Illuminate\Support\Facades\Cache;

it('stores binary values in the database cache', function () {
    $binaryValue = random_bytes(64);

    Cache::store('database')->put('binary', $binaryValue, 60);

    expect(Cache::store('database')->get('binary'))->toBe($binaryValue);
});
