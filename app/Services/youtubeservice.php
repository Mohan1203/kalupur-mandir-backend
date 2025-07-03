<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class YoutubeService {
    protected $apikey;
    protected $channelId;
    protected $cacheKey = 'youtube.videos';
    protected $playlistcacheKey = 'youtube.playlist';

    public function __construct(){
        $this->apikey = config('services.youtube.api');
        $this->channelId = config('services.youtube.channel_id');
    }


    // NOTE: For get videos from Youtube
    public function getVideos($offset, $limit){
    // Get cached videos if available
    $cachedVideos = Cache::get($this->cacheKey, []);

    // If cache is empty OR offset is beyond cached data, fetch from YouTube
    if (empty($cachedVideos) || $offset >= count($cachedVideos)) {
        $fetchedVideos = $this->fetchYoutubeVideos();

        if (!empty($fetchedVideos)) {
            // Save to cache
            Cache::put($this->cacheKey, $fetchedVideos, now()->addDay());
            $cachedVideos = $fetchedVideos;
        }
    }


    $paginated = array_slice($cachedVideos, $offset, $limit);

    return [
        'data' => $paginated,
        'per_page' => $limit,
        'current_page' => floor($offset / $limit) + 1,
        'total' => count($cachedVideos),
        'total_pages' => ceil(count($cachedVideos) / $limit),
    ];
}

    public function fetchYoutubeVideos(){
        $allVideos = [];
        $pageToken = null;

    try {
        do {
            $params = [
                'key' => $this->apikey,
                'channelId' => $this->channelId,
                'part' => 'snippet,id',
                'order' => 'date',
                'maxResults' => 50,
            ];

            if ($pageToken) {
                $params['pageToken'] = $pageToken;
            }

            $response = Http::get('https://www.googleapis.com/youtube/v3/search', $params);

            if (!$response->successful()) {
                Log::error('YouTube API failed', ['response' => $response->body()]);
                break;
            }

            $json = $response->json();

            $videos = collect($json['items'] ?? [])
                ->filter(fn($item) => $item['id']['kind'] === 'youtube#video')
                ->map(function ($item) {
                    return [
                        "id" => $item['id']['videoId'],
                        "title" => $item['snippet']['title'],
                        "description" => $item['snippet']['description'],
                        "thumbnail" => $item['snippet']['thumbnails']['high']['url'],
                        'url' => 'https://www.youtube.com/watch?v=' . $item['id']['videoId'],
                    ];
                })->toArray();

            $allVideos = array_merge($allVideos, $videos);
            $pageToken = $json['nextPageToken'] ?? null;

        } while ($pageToken);

        Log::info("Fetched " . count($allVideos) . " videos from YouTube");
        return $allVideos;

    } catch (\Exception $e) {
        Log::error('YouTube Fetch Error', ['message' => $e->getMessage()]);
        return [];
    }}



    // Fetch playlist from youtube
    public function getPlayLists($offset,$limit){
        $cachedPlaylist = Cache::get($this->playlistcacheKey, []);

    // If cache is empty OR offset is beyond cached data, fetch from YouTube
    if (empty($cachedPlaylist) || $offset >= count($cachedPlaylist)) {
        $fetchedPlaylist = $this->fetchYoutubePlaylist();
        if (!empty($fetchedPlaylist)) {
            // Save to cache
            Cache::put($this->playlistcacheKey, $fetchedPlaylist, now()->addDay());
            $cachedPlaylist = $fetchedPlaylist;
        }
    }
    $paginated = array_slice($cachedPlaylist, $offset, $limit);
    return [
        'data' => $paginated,
        'per_page' => $limit,
        'current_page' => floor($offset / $limit) + 1,
        'total' => count($cachedPlaylist),
        'total_pages' => ceil(count($cachedPlaylist) / $limit),
    ];
    }



    // NOTE: For get playlist from Youtube
    public function fetchYoutubePlaylist(){
        $allPlaylist = [];
        $pageToken = null;
        try{
            do{
                 $params = [
                'key' => $this->apikey,
                'channelId' => $this->channelId,
                'part' => 'snippet,contentDetails',
                'order' => 'date',
                'maxResults' => 50,
            ];

            if ($pageToken) {
                $params['pageToken'] = $pageToken;
            }

            $response = Http::get('https://www.googleapis.com/youtube/v3/playlists', $params);

            if (!$response->successful()) {
                Log::error('YouTube API failed for playlist', ['response' => $response->body()]);
                break;
            }

             $json = $response->json();

            $playlists = collect($json['items'] ?? [])
                ->filter(fn($item) => ($item['kind'] ?? '') === 'youtube#playlist')
                ->map(function ($item) {
                    return [
                        "id" => $item['id'],
                        "title" => $item['snippet']['title'],
                        "description" => $item['snippet']['description'],
                        "thumbnail" => $item['snippet']['thumbnails']['high']['url'],
                        'url' => 'https://www.youtube.com/playlist?list=' . $item['id'],
                    ];
                })->toArray();

            $allPlaylist = array_merge($allPlaylist, $playlists);
            $pageToken = $json['nextPageToken'] ?? null;


            }while($pageToken);
            Log::info("Fetched " . count($allPlaylist) . " playlist from YouTube");
            return $allPlaylist;
        }catch(\Exception $e){
            Log:error($e->getMessage());
        }
    }


}
