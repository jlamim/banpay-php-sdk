<?php

namespace BanPay\Http;

use GuzzleHttp\Client;

class Api
{
    const GET = 'GET';
    const POST = 'POST';

    private function __construct()
    {
    }

    public static function getGuzzleHttpClient()
    {

        $client = new Client([
            'base_uri' => Endpoint::BASE_URL,
        ]);

        return $client;
    }
}
