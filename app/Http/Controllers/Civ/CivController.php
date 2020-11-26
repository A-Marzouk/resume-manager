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
        $response = $http->get(env('CIV_URL') . 'api/search/workforce-profiles');
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

        $response = $http->post(env('CIV_URL') . 'api/login', [
            'form_params' => [
                'client_id' => env('CIV_CLIENT_ID'),
                'client_secret' => env('CIV_CLIENT_SECRET'),
                'email' => env('CIV_LOGIN_EMAIL'),
                'password' => env('CIV_LOGIN_PASS')
            ],
        ]);

        $jsonResponse = json_decode((string)$response->getBody(), true);

        Session::put('civ_access_token', $jsonResponse['access_token']);

        return $jsonResponse['access_token'];
    }

}