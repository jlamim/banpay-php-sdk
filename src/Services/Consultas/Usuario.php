<?php

namespace BanPay\Services\Consultas;

use BanPay\Cliente;
use BanPay\Http\Api;
use BanPay\Http\Endpoint;
use BanPay\Exceptions\BanPayException;

class Usuario
{
    private $nome;
    private $email;
    private $apelido;

    public static function get(Cliente $cliente, $email)
    {

        $response = self::getResponse($cliente, $email);

        $arr = \json_decode($response->getBody(), true)['dados'];

        $usuario = new Usuario;
        $usuario->setNome($arr['usuario']);
        $usuario->setEmail($arr['email']);
        $usuario->setApelido($arr['apelido']);

        return $usuario;
    }


    public static function getResponse(Cliente $cliente, $email)
    {
        $api = Api::getGuzzleHttpClient();
        $response = $api->request(Api::GET, Endpoint::CONSULTA_USUARIO . '/' . $email, [
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
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

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
     * Get the value of apelido
     */
    public function getApelido()
    {
        return $this->apelido;
    }

    /**
     * Set the value of apelido
     *
     * @return  self
     */
    public function setApelido($apelido)
    {
        $this->apelido = $apelido;

        return $this;
    }
}
