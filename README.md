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

## Usage
```php
<?php

use Tristanward\Tinygram\Tinygram;

// Instanciate Tinygram
$tinygram = new Tinygram();

// Get 9 most recent Instagram posts
$media = $tinygram->recentMedia($count = 9);
```

## Sample Output
```php
Collection {
    #items: array:9 [
        0 => array:3 [
            "link" => "" // Link to post on Instagram site
            "location" => "" // Textual real world location of image
            "url" => "" // Instagram URL for highest available resolution image
        ]
            1 => array:3 [
            "link" => ""
            "location" => ""
            "url" => ""
        ]
        2 => array:3 []
        3 => array:3 []
        4 => array:3 []
        5 => array:3 []
        6 => array:3 []
        7 => array:3 []
        8 => array:3 []
    ]
}
```