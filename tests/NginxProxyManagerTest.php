<?php

namespace Eighteen73\NginxProxyManager\Test;

use PHPUnit\Framework\TestCase;
use Eighteen73\NginxProxyManager\NginxProxyManager;

class NginxProxyManagerTest extends TestCase
{
    protected NginxProxyManager $application;

    public function setUp(): void
    {
        $this->application = NginxProxyManager::create();
    }

    protected function getRandomCode(): string
    {
        return substr(md5(microtime()),rand(0,26),6);
    }

    public function testInitialize(): void
    {
        $this->assertInstanceOf(NginxProxyManager::class, $this->application);
    }
}