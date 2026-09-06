<?php
/**
 * Latest video from the joint channel, via YouTube's free public RSS feed.
 * No API key, no quota. Cached on disk so the feed is hit at most once an hour.
 *
 * Always returns an array; on total failure the caller gets nulls and the
 * page falls back to a plain link to the channel. It never fatals a page.
 */

const YT_CACHE_TTL = 3600;      // 1 hour
const YT_HTTP_TIMEOUT = 6;      // seconds

function yt_cache_path(string $name): string {
    return __DIR__ . '/../cache/' . $name;
}

function yt_http_get(string $url): ?string {
    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT        => YT_HTTP_TIMEOUT,
            CURLOPT_USERAGENT      => 'Mozilla/5.0 (compatible; sannayfelo.com)',
        ]);
        $body = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return ($body !== false && $code === 200) ? $body : null;
    }
    $ctx = stream_context_create(['http' => [
        'timeout' => YT_HTTP_TIMEOUT,
        'header'  => "User-Agent: Mozilla/5.0 (compatible; sannayfelo.com)\r\n",
    ]]);
    $body = @file_get_contents($url, false, $ctx);
    return $body !== false ? $body : null;
}

/** Turn an @handle into a UC… channel id, once, then remember it. */
function yt_resolve_channel_id(string $handle): ?string {
    $cache = yt_cache_path('channel_id.txt');
    if (is_readable($cache)) {
        $id = trim((string) file_get_contents($cache));
        if ($id !== '') return $id;
    }
    $html = yt_http_get('https://www.youtube.com/' . ltrim($handle, '/'));
    if ($html === null) return null;
    if (preg_match('~"channelId":"(UC[\w-]{22})"~', $html, $m)
        || preg_match('~/channel/(UC[\w-]{22})~', $html, $m)) {
        @file_put_contents($cache, $m[1]);
        return $m[1];
    }
    return null;
}

/**
 * @return array{title:?string,url:?string,thumb:?string,published:?string}
 */
function yt_latest_video(array $cfg): array {
    $empty = ['title' => null, 'url' => null, 'thumb' => null, 'published' => null];
    $cache = yt_cache_path('latest_video.json');

    // Fresh cache wins.
    if (is_readable($cache) && (time() - filemtime($cache)) < YT_CACHE_TTL) {
        $data = json_decode((string) file_get_contents($cache), true);
        if (is_array($data)) return $data + $empty;
    }

    $channelId = $cfg['youtube']['channel_id'] ?: yt_resolve_channel_id($cfg['youtube']['handle']);

    $parsed = null;
    if ($channelId) {
        $xml = yt_http_get('https://www.youtube.com/feeds/videos.xml?channel_id=' . urlencode($channelId));
        if ($xml !== null) {
            $prev = libxml_use_internal_errors(true);
            $feed = simplexml_load_string($xml);
            libxml_use_internal_errors($prev);
            if ($feed && isset($feed->entry[0])) {
                $entry = $feed->entry[0];
                $media = $entry->children('http://search.yahoo.com/mrss/');
                $vid   = (string) $entry->children('http://www.youtube.com/xml/schemas/2015')->videoId;
                $parsed = [
                    'title'     => trim((string) $entry->title),
                    'url'       => $vid ? 'https://www.youtube.com/watch?v=' . $vid : (string) $entry->link['href'],
                    'thumb'     => $vid ? 'https://i.ytimg.com/vi/' . $vid . '/maxresdefault.jpg' : null,
                    'published' => (string) $entry->published,
                ];
            }
        }
    }

    if ($parsed) {
        @file_put_contents($cache, json_encode($parsed));
        return $parsed;
    }

    // Fetch failed — serve stale rather than nothing.
    if (is_readable($cache)) {
        $data = json_decode((string) file_get_contents($cache), true);
        if (is_array($data)) return $data + $empty;
    }
    return $empty;
}
