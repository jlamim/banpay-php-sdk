<?php

namespace BanPay\Services\Consultas;

use BanPay\Cliente;
use BanPay\Http\Api;
use BanPay\Http\Endpoint;
use BanPay\Exceptions\BanPayException;

class Saldo
{
    private $usuario;
    private $saldoDisponivel;

    public static function get(Cliente $cliente)
    {

        $response = self::getResponse($cliente);

        $arr = \json_decode($response->getBody(), true)['dados'];

        $saldo = new Saldo;
        $saldo->setUsuario($arr['usuario']);
        $saldo->setSaldoDisponivel($arr['saldo']);

        return $saldo;
    }


    public static function getResponse(Cliente $cliente)
    {
        $api = Api::getGuzzleHttpClient();
        $response = $api->request(Api::GET, Endpoint::CONSULTA_SALDO, [
            'headers' => [
                'Content-Type' => 'application/json',
                'chaveAPI'     => $cliente->getToken()
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
