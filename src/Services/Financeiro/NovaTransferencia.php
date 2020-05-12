<?php

namespace BanPay\Services\Financeiro;

use BanPay\Cliente;
use BanPay\Http\Api;
use BanPay\Http\Endpoint;
use BanPay\Exceptions\BanPayException;
use BanPay\Services\Financeiro\Transferencia;
use BanPay\Services\Financeiro\Resposta;

class NovaTransferencia
{

    public function executar(Cliente $cliente, Transferencia $transferencia)
    {

        $response = self::postResponse($cliente, $transferencia);

        $arr = \json_decode($response->getBody(), true)['dados'];

        $resposta = new Resposta;
        $resposta->setTransacao($arr['transacao']);
        $resposta->setSucesso($arr['sucesso']);
        $resposta->setMensagem($arr['mensagem']);

        return $resposta;
    }

    public static function postResponse(Cliente $cliente, Transferencia $transferencia)
    {


        $api = Api::getGuzzleHttpClient();
        $response = $api->request(Api::POST, Endpoint::REALIZA_TRANSFERENCIA, [
            'headers' => [
                'Content-Type'   => 'application/json',
                'chaveAPI' => $cliente->getToken()
            ],
            'json' => [
                'contaDestino' => $transferencia->getContaDestino(),
                'valor'        => $transferencia->getValor()
            ]
        ]);

        $arr = \json_decode($response->getBody(), true);

        if ($arr['sucesso'] == false) {
            throw new BanPayException($arr['mensagem']);
        }

        return $response;
    }
}