<?php

namespace App\Http\Front\Controllers;

use App\Http\Front\Requests\SubscribeToEmailListRequest;
use Exception;
use Illuminate\Support\Facades\Http;

class SubscribeToEmailListController
{
    public function __invoke(SubscribeToEmailListRequest $request)
    {
        $subscriptionUuid = config('services.mailcoach.subscription_uuid');

        if (! $subscriptionUuid) {
            flash()->error('Subscribing is not possible at the moment.');

            return back();
        }

        $response = Http::post("https://spatie.be/mailcoach/subscribe/{$subscriptionUuid}", [
            'email' => $request->email,
            'tags' => 'front-line-videos',
        ]);

        if (! $response->successful()) {
            throw new Exception("Could not subscribe, Mailcoach responded with status {$response->status()}");
        }

        flash()->success("You've been successfully subscribed, you can expect the first video to arrive in your mailbox within a few minutes.");

        return back();
    }
}
