<?php

/**
 * BanPay PHP SDK
 *
 * An open source library for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2020 Jonathan Lamim
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package    BanPay
 * @author     Jonathan Lamim
 * @copyright  2020 - Jonathan Lamim
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://github.com/jlamim/banpay-php-sdk
 * @since      Version 1.0.1
 * @filesource
 */

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
        $api = Api::getGuzzleHttpClient($cliente);
        $response = $api->request(Api::POST, Endpoint::REALIZA_TRANSFERENCIA, [
            'headers' => [
                'Content-Type'   => 'application/x-www-form-urlencoded',
                'chaveAPI' => $cliente->getToken()
            ],
            'form_params' => [
                'contaDestino' => $transferencia->getContaDestino(),
                'valor'        => $transferencia->getValor()
            ],
            'verify' => $cliente->getVerifySSL(),
            'http_errors' => false
        ]);

        $arr = \json_decode($response->getBody(), true);

        if ($arr['sucesso'] == false) {
            throw new BanPayException($arr['mensagem']);
        }

        return $response;
    }
}
