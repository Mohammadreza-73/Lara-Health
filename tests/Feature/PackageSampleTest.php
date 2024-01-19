<?php

namespace Tests\Feature;

use Orchestra\Testbench\TestCase;

class PackageSampleTest extends TestCase
{
    public function testConfigFile()
    {
        $this->assertFileExists(dirname(__DIR__) . '/../config/health.php', 'File not exists');

        $array = include dirname(__DIR__) . '/../config/health.php';

        $this->assertArrayHasKey('database', $array, 'Config values did not set true');
        $this->assertArrayHasKey('migrations', $array, 'Config values did not set true');
        $this->assertArrayHasKey('routes', $array, 'Config values did not set true');
    }
}
