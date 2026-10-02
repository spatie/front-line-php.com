<?php

use Spatie\FlareClient\Flare;
use Spatie\FlareClient\FlareConfig;

it('reports exceptions to Flare', function () {
    $exception = new RuntimeException('Something went wrong');

    app(FlareConfig::class)->apiToken = 'test-key';

    $this->mock(Flare::class)
        ->shouldReceive('report')
        ->once()
        ->with($exception);

    report($exception);
});
