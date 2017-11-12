<?php
declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;
use \lracicot\WordPressOrgApi\ThemesActions;

/**
 * @covers WordPressOrgApi
 */
final class ThemesActionsTest extends TestCase
{
    public function testGeneratePopularThemesRequest(): void
    {
        $action = ThemesActions::popular(0, 24);
        $this->assertEquals($action->getMethod(), 'POST');
        $this->assertEquals($action->getUri()->getPath(), '/themes/info/1.0/');
    }
}
