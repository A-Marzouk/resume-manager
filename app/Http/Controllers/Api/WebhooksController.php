<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class WebhooksController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $mapWebhookToHandlers = [
            'forget.civ.profiels' => 'forgetCivProfiles',
        ];

        $webhookName = $request->get('name');

        if (!array_key_exists($webhookName, $mapWebhookToHandlers)) {
            return response()->json([
                'status' => 'Bad request',
                'message' => "Invalid argument $webhookName"
            ], 400);
        }

        $handler = $mapWebhookToHandlers[$webhookName];
        return $this->$handler($request);
    }

    public function forgetCivProfiles(Request $request)
    {
        // $page = 1;
        // $workforceProfiles = $request->get('workforce-profiles');
        if (Hash::check(config('services.civ.api_token'), $request->get('api_token'))) {
            Cache::tags(['workforce-profiles-pages'])->flush();
            // Cache::tags(['workforce-profiles-pages'])->put("workforce-profiles-page-$page", $workforceProfiles, now()->addMinutes(7 * 24 * 60));
            return response()->json([
                'status' => 'Success',
                'message' => 'Cache cleared successfully.'
            ]);
        }

        return response()->json(['status' => 'Unauthorized'], 401);
    }
}
