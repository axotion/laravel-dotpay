<?php

namespace Evilnet\Dotpay\DotpayApi;

use Evilnet\Dotpay\DotpayApi\Contracts\IRequest;

/**
 * Class Client
 * @package Evilnet\Dotpay\DotpayApi
 */
class Client
{
    /**
     * @var
     */
    private $username;
    /**
     * @var
     */
    private $password;
    /**
     * @var
     */
    private $base_url;
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * Client constructor.
     * @param $username
     * @param $password
     * @param $base_url
     */
    public function __construct($username, $password, $base_url)
    {
        $this->username = $username;
        $this->password = $password;
        $this->base_url = $base_url;
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * @param IRequest $request
     * @return mixed
     */
    public function makeRequest(IRequest $request)
    {
        $options = [
            'auth' => [
                $this->username,
                $this->password
            ],
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
            'body' => json_encode($request->toArray(), 320)
        ];
        return json_decode($this->client->request($request->method(),$this->base_url.$request->path(), $options)->getBody());
    }
}
