<?php

namespace LeandroFerreiraMa\ItauAuth;

class Auth
{
    const PRODUCTION = '';
    const SANDBOX = 'https://devportal.itau.com.br/api/jwt';

    private string $apiUrl;
    private array $fields;
    private string $method;
    protected ?object $response;

    public function __construct()
    {
        $this->method = 'POST';
    }

    public function production(): self
    {
        $this->apiUrl = self::PRODUCTION;
        return $this;
    }

    public function sandbox(): self
    {
        $this->apiUrl = self::SANDBOX;
        return $this;
    }

    public function token(string $clientId, string $clientSecret): ?object
    {
        $this->fields = array_map("strip_tags", [
            'client_id' => $clientId,
            'client_secret' => $clientSecret
        ]);

        $this->dispatch();
        return $this->response;
    }

    private function dispatch(): void
    {
        $curl = curl_init();
        $fields = http_build_query($this->fields);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->method,
            CURLOPT_POSTFIELDS => $fields,
            CURLOPT_HTTPHEADER => [],
        ));

        $this->response = json_decode(curl_exec($curl));
        curl_close($curl);
    }
}