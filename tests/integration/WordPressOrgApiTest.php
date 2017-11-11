<?php
declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Promise;

use \lracicot\WordPressOrgApi\WordPressOrgApi;

/**
 * @covers WordPressOrgApi
 */
final class WordPressOrgApiTest extends TestCase
{
    public function testCanSendPopularPluginRequest(): void
    {
        $api = new WordPressOrgApi();
        $response = $api->popularPlugins()->wait();

        $this->assertEquals($response->getStatusCode(), 200);

        $results = unserialize($response->getBody()->getContents());

        $this->assertFalse(isset($results->error));
    }

    public function testPerPageIsWorking(): void
    {
        $n = 10;
        $api = new WordPressOrgApi();
        $response = $api->popularPlugins(1, $n)->wait();

        $results = unserialize($response->getBody()->getContents());

        $this->assertEquals(count($results->plugins), $n);
    }

    public function testPaginationIsWorking(): void
    {
        $api = new WordPressOrgApi();
        $response1 = $api->popularPlugins(1)->wait();
        $response2 = $api->popularPlugins(2)->wait();

        $results1 = unserialize($response1->getBody()->getContents());
        $results2 = unserialize($response2->getBody()->getContents());

        $this->assertFalse($results1->plugins[0]->slug == $results2->plugins[0]->slug);
    }
}
