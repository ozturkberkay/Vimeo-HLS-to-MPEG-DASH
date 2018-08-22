# Vimeo HLS to MPEG-DASH
> A simple PHP class to convert Vimeo HLS links to MPEG-DASH links.

 If you have a Vimeo PRO or Business account, you can access the direct links for your videos. While the HLS stream link is provided, there are no links to the .mpd file for MPEG-DASH streaming. With this simple PHP class, you will be able to access the .mpd files for your videos and use third-party players such as video.js to stream!

## Usage example

```php
<?php

// Import the code
require_once('vimeo-hls-to-mpeg-dash.php');

// Get your Vimeo .m3u8 link
$m3u8 = 'link_to_your_hls_stream';

// Check if the link is in expected format (optional) and convert it to a .mpd link
if (Vimeo_HLS_to_MPEG_DASH::is_link_hls($m3u8)) {
    
    $mpd = Vimeo_HLS_to_MPEG_DASH::convert($m3u8);
    
    $type = 'application/dash+xml';
    
}

// Finally, use your .mpd link wherever you want!
$source = '<source src="' . $mpd . '" type="' . $type . '"/>';
```

## Release History

* 0.0.1
    * Initial release

## Meta

Berkay Öztürk – info@berkayozturk.net

Distributed under the GNU General Public License v3.0 license. See ``LICENSE`` for more information.

[https://github.com/berkayozturk/Vimeo-HLS-to-MPEG-DASH](https://github.com/berkayozturk/Vimeo-HLS-to-MPEG-DASH)
