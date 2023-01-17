<?php

namespace Eighteen73\NginxProxyManager\Api;

use Eighteen73\NginxProxyManager\Concerns\ApiAccess;
use Eighteen73\NginxProxyManager\Contracts\CrudEndpoint;

abstract class BaseApi implements CrudEndpoint
{
    use ApiAccess;
}