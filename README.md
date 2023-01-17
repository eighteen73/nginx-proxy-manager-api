# Nginx Proxy Manager PHP Library
PHP Library for [NginxProxyManager](https://github.com/NginxProxyManager) API.

## Requirements

* PHP 8.0+
* guzzlehttp/guzzle 7.4+
* ext-json extension

## Installation

```bash
composer require eighteen73/nginx-proxy-manager-php
```

Otherwise just download the package and add it to the autoloader.

## Usage

Create an API instance.

```php
$nginx = Eighteen73\NginxProxyManager\NginxProxyManager::create($accessToken);
```

Push a new record to the API
```php

```

Update an existing record
```php

```

Delete a record
```php

```

## Links ##
* [License](./LICENSE)
