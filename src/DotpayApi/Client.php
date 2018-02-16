<?php

namespace Evilnet\Dotpay\DotpayApi;

use Evilnet\Dotpay\DotpayApi\Contracts\IRequest;

class Client
{
    private $username;
    private $password;
    private $base_url;
    private $client;

    public function __construct($username, $password, $base_url)
    {
        $this->username = $username;
        $this->password = $password;
        $this->base_url = $base_url;
        $this->client = new \GuzzleHttp\Client();
    }

    public function makeRequest(IRequest $request)
    {
        $options = [
            'auth' => [
                $this->username,
                $this->password
            ],
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
            'json' => $request->toArray()
        ];
        return json_decode($this->client->request($request->method(),$this->base_url.$request->path(), $options)->getBody());
    }
}
