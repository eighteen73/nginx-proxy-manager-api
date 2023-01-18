<?php

namespace Eighteen73\NginxProxyManager\Concerns;

use GuzzleHttp\Client;

trait ApiAccess {

    protected const TOKEN_EXPIRE_AGE = '10y';

    protected string $baseUrl;

    protected string $accessToken;

    protected string $letsEncryptEmail = 'example@example.com';

    public static function createAccessToken(string $baseUrl, string $email, string $password): string
    {
        $client = new Client([
            'base_uri' => $baseUrl,
        ]);

        try {
            $response = $client->post('/api/tokens', [
                'json' => [
                    'scope' => 'user',
                    'expiry' => self::TOKEN_EXPIRE_AGE,
                    'identity' => $email,
                    'secret' => $password,
                ]
            ]);

            $token = json_decode($response->getBody()->getContents());
        } catch (\Exception $e) {
            throw new \Exception('Unable to get access token: ' . $e->getMessage());
        }

        return $token['token'];
    }

    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    public function setLetsEncryptEmail(string $letsEncryptEmail): void
    {
        $this->letsEncryptEmail = $letsEncryptEmail;
    }

    public function getLetsEncryptEmail(): string
    {
        return $this->letsEncryptEmail;
    }

    protected function request(string $type, string $endpoint, ?array $query = null, ?array $data = null): mixed
    {
        $client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
            ],
        ]);

        $response = $client->request($type, $endpoint, [
            'query' => $query,
            'json' => $data,
        ]);

        return json_decode($response->getBody()->getContents());
    }
}