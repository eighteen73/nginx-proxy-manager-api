<?php

namespace Eighteen73\NginxProxyManager\Api;

use Eighteen73\NginxProxyManager\Contracts\Model;
use Eighteen73\NginxProxyManager\Models\Certificate;

class Certificates extends BaseApi
{

    public function create(array $data): Model
    {
        $data['meta']['letsencrypt_email'] = $this->getLetsEncryptEmail();

        $response = $this->request(
            type: 'POST',
            endpoint:'/api/nginx/certificates',
            data: $data,
        );

        return Certificate::fromArray($response);
    }

    public function read(int $id): Model
    {
        $response = $this->request(
            type: 'GET',
            endpoint: '/api/nginx/certificates/' . $id,
            query: ['expand' => 'owner'],
        );

        return Certificate::fromArray($response);
    }

    public function update(int $id, array $data): Model
    {
        $data['meta']['letsencrypt_email'] = $this->getLetsEncryptEmail();

        $response = $this->request(
            type: 'PUT',
            endpoint:'/api/nginx/certificates' . $id,
            data: $data,
        );

        return Certificate::fromArray($response);
    }

    public function delete(int $id): bool
    {
        return $this->request(
            type: 'DELETE',
            endpoint: '/api/nginx/certificates/' . $id,
        );
    }

    public function list(): array
    {
        $hosts = $this->request(
            type: 'GET',
            endpoint: '/api/nginx/certificates',
            query: ['expand' => 'owner'],
        );

        foreach ($hosts as $index => $host) {
            $hosts[$index] = Certificate::fromArray($host);
        }

        return $hosts;
    }
}