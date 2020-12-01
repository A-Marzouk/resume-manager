<?php

namespace App\Http\Controllers\Civ;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Throwable;


class CivController extends Controller
{

    public function getProfiles()
    {
        $civAccessToken = $this->authorizeWorkForceClient();
        $http = new \GuzzleHttp\Client(['headers' => ['Authorization' => 'Bearer ' . $civAccessToken]]);
        $response = $http->get(config('services.civ.url') . 'api/search/workforce-profiles');
        $jsonResponse = json_decode((string)$response->getBody(), true);

        foreach ($jsonResponse as &$user){
            $user['preview'] = $this->getProfilePreview($user['id'], $user['url']);
        }

        return $jsonResponse;
    }

    protected function getProfilePreview($id, $url)
    {

        $params = http_build_query(array(
            "access_key" => "e4bd39db9ae142b9af6312b0e09210e7",
            "url" => $url,
        ));

        $target = "images/civ-profiles/preview_" . $id . "_.jpeg";

        if(file_exists($target)){
          return $target;
        }

        try {
            $image_data = file_get_contents("https://api.apiflash.com/v1/urltoimage?" . $params);
            file_put_contents($target, $image_data);

            return $target ;

        } catch (Throwable $e) {
            report($e);

            return "";
        }
    }

    public function loadCivProfile($username, $version = ''){
        return view('civ.profile', compact('username','version'));
    }


    public function authorizeWorkForceClient()
    {

        $session = Session::get('civ_access_token');

        if ($session) {
            return $session;
        }

        $http = new \GuzzleHttp\Client;

        $response = $http->post(config('services.civ.url') . 'api/login', [
            'form_params' => [
                'client_id' => config('services.civ.client_id'),
                'client_secret' => config('services.civ.client_secret'),
                'email' => config('services.civ.login'),
                'password' => config('services.civ.password')
            ],
        ]);

        $jsonResponse = json_decode((string)$response->getBody(), true);

        Session::put('civ_access_token', $jsonResponse['access_token']);

        return $jsonResponse['access_token'];
    }

}