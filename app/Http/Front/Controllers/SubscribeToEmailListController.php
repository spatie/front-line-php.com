<?php

namespace App\Http\Front\Controllers;

use App\Http\Front\Requests\SubscribeToEmailListRequest;
use Exception;
use Illuminate\Support\Facades\Http;

class SubscribeToEmailListController
{
    public function __invoke(SubscribeToEmailListRequest $request)
    {
        if (! app()->environment('production')) {
            flash()->error('Subscribing is only possible in production');
        }

        $response = Http::post("https://spatie.be/mailcoach/subscribe/" .config('services.mailcoach.subscription_uuid'), [
            'email' => $request->email,
            'tags' => 'front-line-videos',
        ]);

        if (! $response->successful()) {
            ld()->error('Something went wrong', $response, $response);

            throw new Exception('Could not subscribe');
        }

        flash()->success("You've been successfully subscribed, you can expect the first video to arrive in your mailbox within a few minutes.");

        return back();
    }
}
