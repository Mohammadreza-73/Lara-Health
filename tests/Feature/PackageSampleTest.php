<?php
namespace Tests\Feature;

use Orchestra\Testbench\TestCase;

class PackageSampleTest extends TestCase
{
    public function testConfigFile()
    {
        $this->assertFileExists(__DIR__.'/../config/health.php', 'فایل کانفیگ وجود ندارد');

        $array = include(__DIR__.'/../config/health.php');
        $this->assertArrayHasKey('database', $array, 'مقادیر کانفیگ به درستی ست نشده‌اند');
        $this->assertArrayHasKey('migrations', $array, 'مقادیر کانفیگ به درستی ست نشده‌اند');
        $this->assertArrayHasKey('routes', $array, 'مقادیر کانفیگ به درستی ست نشده‌اند');
    }
}