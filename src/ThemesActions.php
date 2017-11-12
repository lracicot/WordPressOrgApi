<?php
declare(strict_types=1);

namespace lracicot\WordPressOrgApi;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

/**
 * Plugins action creators
 */
class ThemesActions
{
    private static $baseUri = '/themes/info/1.0/';

    public static function popular(int $page, int $perPage): Request
    {
        $args = (object)[
            'browse' =>'popular',
            'page' => $page,
            'per_page' => $perPage,
            'fields' => [
                'last_updated' => true,
                'versions' => true,
            ],
        ];

        $params = [
            'action' => 'query_themes',
            'request' => serialize($args),
        ];

        return new Request('post', self::$baseUri, [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ], http_build_query($params));
    }
}
