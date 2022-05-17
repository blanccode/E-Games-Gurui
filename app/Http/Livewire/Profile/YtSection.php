<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class YtSection extends Component

{
    public $channelData;
    public $currentUserData ;
    public $channelId;
    public $channelTitle;
    public $channelImageUrl;
    public $channelSubsCount;
    public $channelVideoCount;
    public $score;

    public function mount() {
        $currentUser = User::where('id', auth()->id())->first();
//        dd($currentUser->youtube_account_id);
//        $this->calcScore(5000, 1000, 20);
//        $this->calcScore(93369828, 176000, 3270);

        $this->currentUserData = $currentUser;
//        dd(strval($this->currentUserData->youtube_account_id));
//        dd($this->currentUserData[0]->url);

    }
    public function calcScore($views, $subs, $videos) {
        $result = ((($views * 0.66) * ($videos * 0.60) / ($subs * .5) / 55));
//        dd(number_format(round($result, 2),2));
        return $result;
    }


    public function searchChannelId($channelName) {
        if ($channelName) {
            $part = 'snippet';
            $maxResults = 1;
            $apiKey = config('services.youtube.api_key');
            $youtubeEndpoint = config('services.youtube.search_endpoint');


            $url = "$youtubeEndpoint?part=$part&maxResults=$maxResults&q=$channelName&key=$apiKey";
//
            $response = Http::get($url);
            $formatedResponse = json_decode($response);
            $channelName = $formatedResponse->{'items'}[0]->{'snippet'}->{'title'};
            $channelId = $formatedResponse->{'items'}[0]->{'snippet'}->{'channelId'};
            dd($formatedResponse,$channelName,$channelId);

            return  $channelId;
        }

    }   public function getChannel($channelId) {
        if ($channelId) {
            $part = 'snippet,contentDetails,statistics';
            $maxResults = 1;
            $apiKey = config('services.youtube.api_key');
            $youtubeEndpoint = config('services.youtube.channels_endpoint');
//            $channelId = "UC9IImcLkUdmURWtQhxu8VwQ";

//          $type = 'channel';

            $url = "$youtubeEndpoint?part=$part&maxResults=$maxResults&id=$channelId&key=$apiKey";
            $response = Http::get($url);
            $formatedResponse = json_decode($response);
    //        $channelId = $formatedResponse->{'items'}[0]->{'id'}->{'channelId'};

            $channelTitle = $formatedResponse->{'items'}[0]->{'snippet'}->{'title'};
            $channelImageUrl = $formatedResponse->{'items'}[0]->{'snippet'}->{'thumbnails'}->{'default'}->{'url'};
            $channelSubsCount = $formatedResponse->{'items'}[0]->{'statistics'}->{'subscriberCount'};
            $channelViewCount = $formatedResponse->{'items'}[0]->{'statistics'}->{'viewCount'};
            $channelVideoCount = $formatedResponse->{'items'}[0]->{'statistics'}->{'videoCount'};
            $playlistId = $formatedResponse->{'items'}[0]->{'contentDetails'}->{'relatedPlaylists'}->{'uploads'};


            $array = ['yt_channel_name' => $channelTitle,'yt_channel_url' => $channelImageUrl, 'yt_channel_subs' => $channelSubsCount,'yt_channel_views' => $channelViewCount, 'yt_channel_video_count' => $channelVideoCount, 'yt_channel_playlist_id' => $playlistId];
            return $array;
//            dd($channelData);
        }

    }

    protected $rules = [
        'channelId' => '|string|max:25',


    ];

    public function getYtFieldsData($channelId) {
        return [
            'youtube_account_id' => $channelId ?? $this->channelId,
            'yt_channel_name' => $this->channelData['yt_channel_name'],
            'yt_channel_url' => $this->channelData['yt_channel_url'],
            'yt_channel_views' => $this->channelData['yt_channel_views'],
            'yt_channel_subs' => $this->channelData['yt_channel_subs'],
            'yt_channel_video_count' => $this->channelData['yt_channel_video_count'],
            'yt_channel_playlist_id' => $this->channelData['yt_channel_playlist_id'],
            'score' => $this->score,
        ];
    }

    public function updateChannelData() {
//        $ytChannelId = auth()->user()->youtube_account_id;
////        dd($ytChannelId);
//        $this->channelData = $this->getChannel($ytChannelId);
//        User::where('id', auth()->id())
//            ->update($this->getYtFieldsData($ytChannelId));
        dd('data updated ');
    }


    public function postChannelId() {

        $this->validate();

//        $data = [
//            'youtube_account_id' => $this->channelId,
//        ];




        if ($this->channelId) {
            $channelId = $this->channelId;

            $this->channelData = $this->getChannel($channelId);
            $this->score = $this->calcScore($this->channelData['yt_channel_views'],$this->channelData['yt_channel_subs'],$this->channelData['yt_channel_video_count']);


            User::where('id', auth()->id())->update($this->getYtFieldsData($channelId));

//

        }




    }

    public function succesMessage() {
        $this->channelId = true;
    }

//

    public function render()
    {
    //        UCic48jpZWaG_kQ0sj9pTS1w
//        $this->getChannelData();
        return view('livewire.profile.yt-section');
    }
}
