<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class TwitchSection extends Component
{

    public $twitchUrl;
    public $accessToken;
    public $refreshToken;
    public $twitchId;
    public $userName;
    public $userViewCount;
    public $userProfileImageUrl;
    public $userFollowers;
    public $initialUserData;
    public $isLive = 'false';

    public function mount(Request $request) {

        $initialUser = User::find(auth()->id())->first();


//        dd($currentUser->youtube_account_id);
//        $this->calcScore(5000, 1000, 20);
//        $this->calcScore(93369828, 176000, 3270);

        $this->initialUserData = $initialUser;

        $twitchEndpoint = config('services.twitch.endpoint');
        $twitchClientId = config('services.twitch.client_id');
        $redirectUri =  'http://localhost/admin/archive/twitch-profile';
        $scope = 'user:read:email';
        $twitchClientSecret = config('services.twitch.client_secret');
//        return Http::post("$twitchEndpoint$twitchClientId&$twitchClientSecret");
        Session::put('twitchSession', md5(microtime().mt_rand()));
        $twitchSession = Session::get('twitchSession');
        $this->twitchUrl = "https://id.twitch.tv/oauth2/authorize?client_id=$twitchClientId&redirect_uri=$redirectUri&response_type=code&scope=$scope&state=$twitchSession";

        $code = $request->query('code');

        if (isset($code)) {
            $this->getTwitchAccessToken($request);

        }

    }

//'https://api.twitch.tv/helix/search/channels?

    public function getTwitchAccessToken(Request $request) {
        $params = [
            'client_id' => config('services.twitch.client_id'),
            'client_secret' => config('services.twitch.client_secret'),
            'redirect_uri' => 'http://localhost/admin/archive/twitch-profile',
            'code' => $request->query('code'),
            'grant_type' => 'authorization_code'
        ];

        $twitchAccessTokenEndpoint = 'https://id.twitch.tv/oauth2/token?';

        $response = Http::post($twitchAccessTokenEndpoint . http_build_query($params) );


        $decodedResponse = json_decode($response);
        $this->accessToken = $decodedResponse->access_token;
//        dd($this->accessToken);

        $this->refreshToken = $decodedResponse->refresh_token;

        if ($response->status() == 200) {


            $response = $this->getUserInfo();
//            dd($response);

            $userData = $response['api_data']['data'][0];

//            if ($userData['display_name']) {
//
//                $response = $this->getOnlineStatus($userData['display_name']);
////                dd($response);
//                if($response['api_data']['data'][0]['is_live'] != false) {
//                    $this->isLive = 'online';
//                }
//
//            }
            $this->twitchId = $userData['id'];
            $this->userName = $userData['display_name'];
            $this->userProfileImageUrl = $userData['profile_image_url'];
            $this->userViewCount = $userData['view_count'];

            $followers = $this->getFollowerCount($this->twitchId);

            $this->followers = $followers;


            $data = [
                'twitch_id' => $userData['id'],
                'twitch_display_name' => $userData['display_name'],
                'twitch_profile_image_url' => $userData['profile_image_url'],
                'twitch_view_count' => $userData['view_count'],
                'twitch_followers' => $followers,
            ];

            User::find(auth()->id())
                ->update($data);

        } else {
            return $response->status();
        }

    }

//    public function getAuthorizationHeader() {
////        dd($this->accessToken);
//            return [
//                   'authorization' => 'Authorization: Bearer ' . $this->accessToken,
//                    'Client-Id: ' . config('services.twitch.client_id'),
//            ];
//
////        dd([
////            'Client-Id: ' . config('services.twitch.client_id'),
////            'Authorization: Bearer ' . $this->accessToken,
////        ]);
//    }

//    public function getUserData() {
//        $twitchAccessTokenEndpoint = 'https://api.twitch.tv/helix/users?';
//
////        $params = [
//////            'redirect_uri' => 'http://localhost/admin/archive/twitch-profile',
////
//////            'authorization' => $this->getAuthorizationHeader(),
////            'url_params' => [],
////            'scope' => 'user:read:email',
////        ];
//
//        $header = $this->getAuthorizationHeader();
////        dd($header);
//
//        $response = Http::withHeaders($header)
//            ->get($twitchAccessTokenEndpoint);
//
//        $decodedResponse = json_decode($response);
//        dd($response);
//    }

    public function getAuthorizationHeaders() {
        return array( // this array will be used as the header for the api call
            'Client-ID: ' . config('services.twitch.client_id'),
            'Authorization: Bearer ' . $this->accessToken
        );
    }

    public function getOnlineStatus($displayName) {
        $twitchAccessTokenEndpoint = 'https://api.twitch.tv/helix/search/channels';

        $apiParams = array( // params for our api call
            'endpoint' => $twitchAccessTokenEndpoint,
            'type' => 'GET',

            'authorization' => $this->getAuthorizationHeaders(),
            'url_params' => array('query' => $displayName ,'first' => 1,)
        );

        return $this->makeApiCall( $apiParams );
    }

    public function getUserInfo() {
        $twitchAccessTokenEndpoint = 'https://api.twitch.tv/helix/';
        // requet endpoint
        $endpoint = $twitchAccessTokenEndpoint . 'users?';

        $apiParams = array( // params for our api call
            'endpoint' => $endpoint,
            'type' => 'GET',
            'authorization' => $this->getAuthorizationHeaders(),
            'url_params' => array()
        );

        // make api call and return response
        return $this->makeApiCall( $apiParams );
    }
    public function getFollowerCount($userId) {
        $twitchAccessTokenEndpoint = 'https://api.twitch.tv/helix/users/';
        // requet endpoint
        $endpoint = $twitchAccessTokenEndpoint . 'follows';

        $apiParams = array( // params for our api call
            'endpoint' => $endpoint,
            'type' => 'GET',
            'authorization' => $this->getAuthorizationHeaders(),
            'url_params' => array('from_id' => $userId)
        );

        // make api call and return response
        $response = $this->makeApiCall( $apiParams );
        $apiData = $response['api_data'];
        return $apiData['total'];
    }

    public function makeApiCall( $params ) {
        $curlOptions = array( // curl options
            CURLOPT_URL => $params['endpoint'], // endpoint
//            CURLOPT_CAINFO => PATH_TO_CERT, // ssl certificate
            CURLOPT_RETURNTRANSFER => TRUE, // return stuff!
            CURLOPT_SSL_VERIFYPEER => TRUE, // verify peer
            CURLOPT_SSL_VERIFYHOST => 2, // verify host
        );

        if ( isset( $params['authorization'] ) ) { // we need to pass along headers with the request
            $curlOptions[CURLOPT_HEADER] = TRUE;
            $curlOptions[CURLOPT_HTTPHEADER] = $params['authorization'];
        }

        if ( 'POST' == $params['type'] ) { // post request things
            $curlOptions[CURLOPT_POST] = TRUE;
            $curlOptions[CURLOPT_POSTFIELDS] = http_build_query( $params['url_params'] );
        } elseif ( 'GET' == $params['type'] ) { // get request things
            $curlOptions[CURLOPT_URL] .= '?' . http_build_query( $params['url_params'] );
        }

        // initialize curl
        $ch = curl_init();

        // set curl options
        curl_setopt_array( $ch, $curlOptions );

        // make call
        $apiResponse = curl_exec( $ch );

        if ( isset( $params['authorization'] ) ) { // we have headers to deal with
            // get size of header
            $headerSize = curl_getinfo( $ch, CURLINFO_HEADER_SIZE );

            // remove header from response so we are left with json body
            $apiResponseBody = substr( $apiResponse, $headerSize );

            // json decode response body
            $apiResponse = json_decode( $apiResponseBody, true );
        } else { // no headers response is json string
            // json decode response body
            $apiResponse = json_decode( $apiResponse, true );
        }

        // close curl
        curl_close( $ch );

//        return $curlOptions;
        return array(
            'status' => isset( $apiResponse['status'] ) ? 'fail' : 'ok', // if status then there was an error
            'message' => isset( $apiResponse['message'] ) ? $apiResponse['message'] : '', // if message return it
            'api_data' => $apiResponse, // api response data
            'endpoint' => $curlOptions[CURLOPT_URL], // endpoint hit
            'url_params' => $params['url_params'] // url params sent with the request
        );
    }


    public function render()
    {
        return view('livewire.profile.twitch-section');
    }
}
