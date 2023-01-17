<?php

namespace Eighteen73\NginxProxyManager\Api;

use Eighteen73\NginxProxyManager\Contracts\Model;
use Eighteen73\NginxProxyManager\Models\Host;

class Hosts extends BaseApi
{

    public function create(array $data): Model
    {
        $data['meta']['letsencrypt_email'] = $this->getLetsEncryptEmail();

        $response = $this->request(
            type: 'POST',
            endpoint:'/api/nginx/proxy-hosts',
            data: $data,
        );

        return Host::fromArray($response);
    }

    public function read(int $id): Model
    {
        $response = $this->request(
            type: 'GET',
            endpoint: '/api/nginx/proxy-hosts/' . $id,
            query: ['expand' => 'owner,access_list,certificate'],
        );

        return Host::fromArray($response);
    }

    public function update(int $id, array $data): Model
    {
        $data['meta']['letsencrypt_email'] = $this->getLetsEncryptEmail();

        $response = $this->request(
            type: 'PUT',
            endpoint:'/api/nginx/proxy-hosts/' . $id,
            data: $data,
        );

        return Host::fromArray($response);
    }

    public function delete(int $id): bool
    {
        return $this->request(
            type: 'DELETE',
            endpoint: '/api/nginx/proxy-hosts/' . $id,
        );
    }

    public function list(): array
    {
        $hosts = $this->request(
            type: 'GET',
            endpoint: '/api/nginx/proxy-hosts',
            query: ['expand' => 'owner,access_list,certificate'],
        );

        foreach ($hosts as $index => $host) {
            $hosts[$index] = Host::fromArray($host);
        }

        return $hosts;
    }
}