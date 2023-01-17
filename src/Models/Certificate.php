<?php

namespace Eighteen73\NginxProxyManager\Models;

use Eighteen73\NginxProxyManager\Contracts\Model;

class Certificate extends BaseModel implements Model
{
    public array $domain_names = [];

    public array $meta = [
        'letsencrypt_agree' => true,
        'dns_challenge' => false,
    ];

    public string $provider = 'letsencrypt';
}