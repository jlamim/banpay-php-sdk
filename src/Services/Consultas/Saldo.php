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

namespace BanPay\Services\Consultas;

use BanPay\Cliente;
use BanPay\Http\Api;
use BanPay\Http\Endpoint;
use BanPay\Exceptions\BanPayException;

class Saldo
{
    private $usuario;
    private $email;
    private $saldoDisponivel;

    public static function get(Cliente $cliente)
    {

        $response = self::getResponse($cliente);

        $arr = \json_decode($response->getBody(), true)['dados'];

        $saldo = new Saldo;
        $saldo->setUsuario($arr['usuario']);
        //$saldo->setEmail($arr['email']);
        $saldo->setSaldoDisponivel($arr['saldo']);

        return $saldo;
    }


    public static function getResponse(Cliente $cliente)
    {
        $api = Api::getGuzzleHttpClient($cliente);
        $response = $api->request(Api::GET, Endpoint::CONSULTA_SALDO, [
            'headers' => [
                'Content-Type' => 'application/json',
                'chaveAPI'     => $cliente->getToken()
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

    /**
     * Get the value of usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of saldoDisponivel
     */
    public function getSaldoDisponivel()
    {
        return $this->saldoDisponivel;
    }

    /**
     * Set the value of valorDisponivel
     *
     * @return  self
     */
    public function setSaldoDisponivel($saldoDisponivel)
    {
        $this->saldoDisponivel = $saldoDisponivel;

        return $this;
    }
}
