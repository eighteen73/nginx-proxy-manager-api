# Nginx Proxy Manager PHP Library
PHP Library for [NginxProxyManager](https://github.com/NginxProxyManager) API.

## Requirements

* PHP 8.0+
* guzzlehttp/guzzle 7.4+
* ext-json extension

## Installation

```bash
composer require eighteen73/nginx-proxy-manager-api
```

Otherwise just download the package and add it to the autoloader.

## Usage

Retrieve an API Token.

```php
$accessToken = Eighteen73\NginxProxyManager\NginxProxyManager::createAccessToken($baseUrl, $username, $password);
```

Create a new VHost
```php
$nginx = Eighteen73\NginxProxyManager\NginxProxyManager::create($baseUrl, $accessToken);
$nginx->hosts()->create([
    'access_list_id' => '0', // ID of an Access List to restrict host
    'advanced_config' => '', // Advanced Nginx rules
    'allow_websocket_upgrade' => false
    'block_exploits' => true,
    'caching_enabled' => false,
    'certificate_id' => "new", // Either ID of existing cert, or "new" to request a new cert
    'domain_names' => ['example.com'], // Array of domains
    'forward_host' => '127.0.0.1', // Backend server hostname or IP
    'forward_port' => 8080, // Backend server port
    'forward_scheme' => 'http', // Backend listen scheme/protocol
    'hsts_enabled' => true,
    'hsts_subdomains' => false,
    'http2_support' => true,
    'ssl_forced' => true,
    'locations' => [], // Custom location directives for Nginx
    'meta' => [
        'letsencrypt_agree': false,
        'dns_challenge': false,
    ],
]);
```

Update an existing record
```php
$nginx = Eighteen73\NginxProxyManager\NginxProxyManager::create($baseUrl, $accessToken);
$nginx->hosts()->update($id, [
    // As create method above
]);
```

Delete a host
```php
$nginx = Eighteen73\NginxProxyManager\NginxProxyManager::create($baseUrl, $accessToken);
$nginx->hosts()->delete($id);
```

## Links ##
* [Nginx Proxy Manager](https://github.com/NginxProxyManager)
* [License](./LICENSE)
