<?php

namespace App\ThirdParty;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class IpApi
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getLocation($ip)
    {
        try {
            $response = $this->client->get("http://ip-api.com/json/$ip");
            $data = json_decode($response->getBody(), true);

            return $data;
        } catch (GuzzleException $e) {
            return null;
        }
    }
}