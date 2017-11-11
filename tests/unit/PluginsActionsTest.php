<?php
declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;
use \lracicot\WordPressOrgApi\PluginsActions;

/**
 * @covers WordPressOrgApi
 */
final class PluginsActionsTest extends TestCase
{
    public function testGeneratePopularPluginsRequest(): void
    {
        $action = PluginsActions::popular(0, 24);
        $this->assertEquals($action->getMethod(), 'POST');
        $this->assertEquals($action->getUri()->getPath(), '/plugins/info/1.0/');
    }
}
