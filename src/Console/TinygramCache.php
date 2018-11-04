<?php

namespace Tristanward\Tinygram\Console;

use Illuminate\Console\Command;

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
        dd('cache');
    }
}
