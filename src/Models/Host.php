<?php

namespace Eighteen73\NginxProxyManager\Models;

use Eighteen73\NginxProxyManager\Contracts\Model;

class Host extends BaseModel implements Model
{
    public string $access_list_id = "0";

    public string $advanced_config = "";

    public bool $allow_websocket_upgrade = false;

    public bool $block_exploits = true;

    public bool $caching_enabled = false;

    public string $certificate_id = "new";

    public array $domain_names = [];

    public string $forward_host = "";

    public int $forward_port = 0;

    public string $forward_scheme = "http";

    public bool $hsts_enabled = false;

    public bool $hsts_subdomains = false;

    public bool $http2_support = true;

    public array $locations = [];

    public array $meta = [
        'dns_challenge' => true,
        'letsencrypt_agree' => true,
    ];

    public bool $ssl_forced;
}