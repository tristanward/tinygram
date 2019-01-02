# Tinygram
A light-weight Instagram integration.  Pull recent Instagram images into a Laravel website.

## Installation
Install via composer:

```
$ composer require tristanward/tinygram
```

## Configuration
Tinygram requires an Instagram access token to access recent Instagram posts.  Refer to the Instagram docs for help generating an access token.

The Instagram access token should be specified in the Laravel `.env` file:

```
INSTAGRAM_ACCESS_TOKEN=
```

## Cache Instagram Posts

Instagram posts can be cached to limit calls to the Instagram API.  To do this a `tinyimages` table must first be created:

```
php artisan migrate
```

To cache all recent Instagram posts use the `tinygram:cache` console command:

```
php artistan tinygram:cache
```

This command can be used in Laravel's default scheduler, for example to cache recent Instagram posts at 03:00 on Sundays:

```php
// App/Console/Kernel.php

use Tristanward\Tinygram\Console\TinygramCache;

protected $commands = [
    ...
    TinygramCache::class,
];

protected function schedule(Schedule $schedule)
{
    ...
    $schedule->command('tinygram:cache')
        ->sundays()
        ->at('03:00');
}
```

## Usage
Tinygram uses a Laravel facade:

```php
<?php

use Tristanward\Tinygram\Facades\Tinygram;

// Get 9 most recent Cached Instagram posts
$cached = Tinygram::cachedMedia($count = 9);

// Get 9 most recent Instagram posts live from the Instagram API
$recent = Tinygram::recentMedia($count = 9);

// Get full raw data live from the Instagram API
$raw = Tinygram::recentMediaRaw($count = 9);
```

## Output

The `cachedMedia()` method returns a Laravel collection of `Tinyimage` objects.  The underlying Instagram post information can be access using the `Tinyimage` object attributes:

```php
$tinyimage->media_id
$tinyimage->link
$tinyimage->location
$tinyimage->standard_url
$tinyimage->thumb_url
$tinyimage->media_created_at
```

Both the `recentMedia()` and `recentMediaRaw()` methods return a Laravel collection of arrays containing data from Instagram.  Use `dd()` on the output of these methods to see available data.

# Thanks
[https://www.tristanward.co.uk](https://www.tristanward.co.uk)