<?php

namespace BanPay\Http;

use BanPay\Cliente;
use GuzzleHttp\Client;

class Api
{
    const GET = 'GET';
    const POST = 'POST';

    private function __construct()
    {
    }

    public static function getGuzzleHttpClient(Cliente $cliente)
    {

        $client = new Client([
            'base_uri' => ($cliente->getEnvironment() === 'homologacao') ? Endpoint::HOMOLOGACAO_BASE_URL : Endpoint::PRODUCAO_BASE_URL,
        ]);

        return $client;
    }
}
