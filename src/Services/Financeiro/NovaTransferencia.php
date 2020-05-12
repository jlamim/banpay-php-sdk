<?php

namespace BanPay\Services\Financeiro;

use BanPay\Cliente;
use BanPay\Http\Api;
use BanPay\Http\Endpoint;
use BanPay\Exceptions\BanPayException;
use BanPay\Services\Financeiro\Transferencia;
use BanPay\Services\Financeiro\Resposta;
use GuzzleHttp\Exception\ClientException;

class NovaTransferencia
{

    public function executar(Cliente $cliente, Transferencia $transferencia)
    {
        try {
            $response = self::postResponse($cliente, $transferencia);

            $arr = \json_decode($response->getBody(), true);

            $resposta = new Resposta;
            $resposta->setHashTransacao($arr['hashTransacao']);
            $resposta->setStatus($arr['sucesso']);
            $resposta->setMensagem($arr['mensagem']);

            return $resposta;
        } catch (ClientException $e) {
            echo $e->getCode();
        }
    }

    public static function postResponse(Cliente $cliente, Transferencia $transferencia)
    {
        $api = Api::getGuzzleHttpClient();
        $response = $api->request(Api::POST, Endpoint::REALIZA_TRANSFERENCIA, [
            'headers' => [
                'Content-Type'   => 'application/x-www-form-urlencoded',
                'chaveAPI' => $cliente->getToken()
            ],
            'form_params' => [
                'contaDestino' => $transferencia->getContaDestino(),
                'valor'        => $transferencia->getValor()
            ],
            'verify' => false,
            'http_errors' => false
        ]);

        $arr = \json_decode($response->getBody(), true);

        if ($arr['sucesso'] == false) {
            throw new BanPayException($arr['mensagem']);
        }

        return $response;
    }
}
