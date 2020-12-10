<?php

namespace App\Http\Controllers\Civ;


use Throwable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class CivController extends Controller
{
    public function getProfiles(Request $request)
    {
        $page = $request->get('page');
        $count = $request->get('count');

        return Cache::remember("workforce-profiles-page-$page", now()->addMinutes(7 * 24 * 60), function () use ($page, $count) {
            $civAccessToken = $this->authorizeWorkForceClient();
            $http = new \GuzzleHttp\Client([
                'headers' => [
                    'Authorization' => 'Bearer ' . $civAccessToken
                ]
            ]);
            $response = $http->get(
                config('services.civ.url') . "api/search/workforce-profiles?page=$page&&count=$count"
            );

            return json_decode((string)$response->getBody(), true);
        });
    }

    protected function getProfilePreview($id, $url)
    {

        $params = http_build_query(array(
            "access_key" => "e4bd39db9ae142b9af6312b0e09210e7",
            "url" => $url,
        ));

        $target = "images/civ-profiles/preview_" . $id . "_.jpeg";

        if (file_exists($target)) {
            return $target;
        }

        try {
            $image_data = file_get_contents("https://api.apiflash.com/v1/urltoimage?" . $params);
            file_put_contents($target, $image_data);

            return $target;
        } catch (Throwable $e) {
            report($e);

            return "";
        }
    }

    public function loadCivProfile($username, $version = '')
    {
        return view('civ.profile', compact('username', 'version'));
    }


    public function authorizeWorkForceClient()
    {
        if (Cache::has('civ_access_token')) {
            return Cache::get('civ_access_token');
        }

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

        return $jsonResponse['access_token'];
    }
}
