<?php

/**
 * Part of NginxProxyManager package.
 */

namespace Eighteen73\NginxProxyManager;

use Eighteen73\NginxProxyManager\Api\Certificates;
use Eighteen73\NginxProxyManager\Api\Hosts;
use Eighteen73\NginxProxyManager\Concerns\ApiAccess;

class NginxProxyManager
{
    use ApiAccess;

    protected static ?self $instance = null;

    protected ?Hosts $hosts = null;

    protected ?Certificates $certificates = null;

    public function __construct(string $baseUrl, string $accessToken)
    {
        $this->baseUrl = $baseUrl;
        $this->accessToken = $accessToken;
    }

    public static function create(string $baseUrl, string $accessToken): self
    {
        return (static::$instance) ?: new static($baseUrl, $accessToken);
    }

    public function hosts(): Hosts
    {
        if (! $this->hosts) {
            $this->hosts = new Hosts();
            $this->hosts->setBaseUrl($this->baseUrl);
            $this->hosts->setAccessToken($this->accessToken);
        }

        return $this->hosts;
    }

    public function certificates(): Certificates
    {
        if (! $this->certificates) {
            $this->certificates = new Certificates();
            $this->certificates->setBaseUrl($this->baseUrl);
            $this->certificates->setAccessToken($this->accessToken);
        }

        return $this->certificates;
    }
}
