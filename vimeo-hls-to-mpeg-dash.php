<?php

/**
 * Vimeo HLS to MPEG-DASH Link Converter
 * 
 * A simple PHP class to convert Vimeo HLS links to MPEG-DASH links.
 * 
 * @author Berkay Öztürk <info@berkayozturk.net>
 * @version 0.0.1
 * @package VimeoHLStoDASH
 */
abstract class Vimeo_HLS_to_MPEG_DASH {

    /**
     * Checks if the given link is a valid Vimeo HLS link
     * @param string  $hls_link The HLS streaming link from Vimeo
     * @return boolean Checks if the given link is in the expected format
     */
    public static function is_link_hls (string $hls_link) {

        return strpos($hls_link, 'https://player.vimeo.com/external/') === 0 && strpos($hls_link, '.m3u8');
    
    }

    /**
     * Converts the given .m3u8 link to a .mpd link
     * @param string $hls_link The HLS streaming link from Vimeo
     * @return string Converted link for MPEG-DASH streaming
     */
    public static function convert (string $hls_link) {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $hls_link);

        curl_setopt_array($ch, [
                                    CURLOPT_URL             => $hls_link,
                                    CURLOPT_FOLLOWLOCATION  => true,
                                    CURLOPT_NOBODY          => true
                                ]);

        curl_exec($ch);

        $location_header = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

        $location_header = str_replace('m3u8', 'mpd', $location_header);

        return $location_header;
    
    }
    
}
