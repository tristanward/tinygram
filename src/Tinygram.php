<?php

namespace Tristanward\Tinygram;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Tristanward\Tinygram\Models\Tinyimage;

class Tinygram
{
    private $response;

    /**
     * Get raw data for recent instagram posts
     *
     * @param integer $count
     * @return Illuminate\Support\Collection
     */
    public function recentMediaRaw($count = null)
    {
        $this->response = (new Client())->request('GET', $this->recentMediaUrl());

        $media = collect($this->getData());

        if ($count) {
            $media = $media->take($count);
        }

        return $media;
    }

    /**
     * Get basic data for recent instagram posts
     *
     * @param integer $count
     * @return Illuminate\Support\Collection
     */
    public function recentMedia($count = null)
    {
        $basic = $this->recentMediaRaw($count)->map(function($item) {
            return [
                'link' => $item['link'],
                'location' => $item['location']['name'],
                'url' => $item['images']['standard_resolution']['url'],
            ];
        });

        return $basic;
    }

    /**
     * Get cached Tinyimage media
     *
     * @param integer $count
     * @return Illuminate\Support\Collection
     */
    public function cachedMedia($count = null)
    {
        return Tinyimage::orderByDesc('media_created_at')->take($count)->get();
    }

    /**
     * Build recent media Url
     *
     * @return String
     */
    private function recentMediaUrl()
    {
        return config('tinygram.recentMediaBaseUrl') . config('tinygram.token');
    }

    /**
     * Get image data from response
     *
     * @return String
     */
    private function getData()
    {
        return json_decode($this->response->getBody()->getContents(), true)['data'];
    }
}