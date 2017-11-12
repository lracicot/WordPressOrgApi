<?php
declare(strict_types=1);

namespace lracicot\WordPressOrgApi;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Client;

/**
 * The wordpress.org api
 */
class WordPressOrgApi
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://api.wordpress.org/',
            'timeout'  => 30.0,
        ]);
    }

    public function popularPlugins(int $page = 0, int $parPage = 20): PromiseInterface
    {
        return $this->client->sendAsync(
            PluginsActions::popular($page, $parPage)
        );
    }

    public function popularThemes(int $page = 0, int $parPage = 20): PromiseInterface
    {
        return $this->client->sendAsync(
            ThemesActions::popular($page, $parPage)
        );
    }
}
