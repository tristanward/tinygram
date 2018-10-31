<?php

namespace Tristanward\Tinygram\Facades;

use Illuminate\Support\Facades\Facade;

class Tinygram extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Tinygram';
    }
}