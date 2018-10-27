<?php

namespace Tristanward\Tinygram;

use Zttp\Zttp;
use Illuminate\Support\Collection;

class Tinygram
{
    /**
     * Get raw data for recent instagram posts
     *
     * @param integer $count
     * @return Illuminate\Support\Collection
     */
    public function recentMediaRaw($count = null)
    {
        $response = Zttp::get($this->recentMediaUrl());

        $media = collect($response->json()['data']);

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
     * Build recent media Url
     *
     * @return String
     */
    private function recentMediaUrl()
    {
        return config('tinygram.recentMediaBaseUrl') . config('tinygram.token');
    }
}