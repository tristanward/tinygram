<?php

namespace Tristanward\Tinygram\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Tristanward\Tinygram\Facades\Tinygram;
use Tristanward\Tinygram\Models\Tinyimage;

class TinygramCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tinygram:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache all recent Instagram posts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Tinygram::recentMediaRaw()
            ->each(function($post) {
                if (Tinyimage::whereMediaId($post['id'])->count()) {
                    return;
                }

                Tinyimage::create([
                    'media_id' => $post['id'],
                    'link' => $post['link'],
                    'location' => $post['location']['name'],
                    'standard_url' => $post['images']['standard_resolution']['url'],
                    'thumb_url' => $post['images']['thumbnail']['url'],
                    'media_created_at' => Carbon::createFromTimestamp($post['created_time']),
                ]);
            });
    }
}
