<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class WebhooksController extends Controller
{
    /**
     * Map weebhooks to their handlers
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

    /**
     * Clear cached workforce profiles, and recache pages if 
     * last_page param was provided otherwise recache first page
     */
    public function forgetCivProfiles(Request $request)
    {
        /** Check if api_token is valid */
        if (Hash::check(config('services.civ.api_token'), $request->get('api_token'))) {
            $page = 1;
            $lastPage = $request->get('last_page') ?? 1;

            while (Cache::has($key = "workforce-profiles-page-$page")) {
                Cache::forget($key);
                $page++;
            }

            $this->reCacheWorkforceProfiles($lastPage);

            return response()->json([
                'status' => 'Success',
                'message' => 'Cache cleared successfully.'
            ]);
        }

        return response()->json(['status' => 'Unauthorized'], 401);
    }

    /**
     * Reache workforce profiles
     */
    private function reCacheWorkforceProfiles($lastPage)
    {
        if (!Cache::has('civ_access_token')) {
            $client = new \GuzzleHttp\Client;
            $response = $client->post(config('services.civ.url') . 'api/login', [
                'form_params' => [
                    'client_id' => config('services.civ.client_id'),
                    'client_secret' => config('services.civ.client_secret'),
                    'email' => config('services.civ.login'),
                    'password' => config('services.civ.password')
                ],
            ]);
            $jsonResponse = json_decode((string)$response->getBody(), true);
            Cache::put('civ_access_token', $jsonResponse['access_token'], now()->addMinutes(7 * 24 * 60));
        }

        $client = new \GuzzleHttp\Client(['headers' => [
            'Authorization' => 'Bearer ' . Cache::get('civ_access_token')
        ]]);

        $page = 1;
        while ($page <= $lastPage) {
            $response = $client->get(
                config('services.civ.url') . "api/search/workforce-profiles?page=1&&count=10"
            );
            $jsonResponse = json_decode((string)$response->getBody(), true);
            Cache::put("workforce-profiles-page-$page", $jsonResponse, now()->addMinutes(7 * 24 * 60));
            $page++;
        }
    }
}
