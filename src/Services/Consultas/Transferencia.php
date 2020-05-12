<?php

namespace BanPay\Services\Consultas;

use BanPay\Cliente;
use BanPay\Http\Api;
use BanPay\Http\Endpoint;
use BanPay\Exceptions\BanPayException;
use Carbon\Carbon;

class Transferencia
{
    private $data;
    private $dataCarbon;
    private $valor;
    private $origem;
    private $origemUsuario;
    private $origemNome;
    private $origemEmail;
    private $destinoUsuario;
    private $destinoNome;
    private $destinoEmail;

    public static function get(Cliente $cliente, $codigo)
    {

        $response = self::getResponse($cliente, $codigo);

        $arr = \json_decode($response->getBody(), true)['dados'];

        $transferencia = new Transferencia;
        $transferencia->setData($arr['data']);
        $transferencia->setValor($arr['valor']);
        $transferencia->setOrigem($arr['origem']);
        $transferencia->setOrigemUsuario($arr['usuarioOrigem']['apelido']);
        $transferencia->setOrigemNome($arr['usuarioOrigem']['nome']);
        $transferencia->setOrigemEmail($arr['usuarioOrigem']['email']);
        $transferencia->setDestinoUsuario($arr['usuarioDestino']['usuario']);
        $transferencia->setDestinoNome($arr['usuarioDestino']['nome']);
        $transferencia->setDestinoEmail($arr['usuarioDestino']['email']);

        return $transferencia;
    }

    public static function getResponse(Cliente $cliente, $codigo)
    {

        $api = Api::getGuzzleHttpClient();
        $response = $api->request(Api::GET, Endpoint::CONSULTA_TRANSFERENCIA . '/' . $codigo, [
            'headers' => [
                'Content-Type' => 'application/json',
                'chaveAPI' => $cliente->getToken()
            ]
        ]);

        $arr = \json_decode($response->getBody(), true);

        if ($arr['sucesso'] == false) {
            throw new BanPayException($arr['mensagem']);
        }

        return $response;
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of valor
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of origem
     */
    public function getOrigem()
    {
        return $this->origem;
    }

    /**
     * Set the value of origem
     *
     * @return  self
     */
    public function setOrigem($origem)
    {
        $this->origem = $origem;

        return $this;
    }

    /**
     * Get the value of origemUsuario
     */
    public function getOrigemUsuario()
    {
        return $this->origemUsuario;
    }

    /**
     * Set the value of origemUsuario
     *
     * @return  self
     */
    public function setOrigemUsuario($origemUsuario)
    {
        $this->origemUsuario = $origemUsuario;

        return $this;
    }

    /**
     * Get the value of origemNome
     */
    public function getOrigemNome()
    {
        return $this->origemNome;
    }

    /**
     * Set the value of origemNome
     *
     * @return  self
     */
    public function setOrigemNome($origemNome)
    {
        $this->origemNome = $origemNome;

        return $this;
    }

    /**
     * Get the value of origemDocumento
     */
    public function getOrigemEmail()
    {
        return $this->origemEmail;
    }

    /**
     * Set the value of origemDocumento
     *
     * @return  self
     */
    public function setOrigemEmail($origemEmail)
    {
        $this->origemEmail = $origemEmail;

        return $this;
    }

    /**
     * Get the value of destinoUsuario
     */
    public function getDestinoUsuario()
    {
        return $this->destinoUsuario;
    }

    /**
     * Set the value of destinoUsuario
     *
     * @return  self
     */
    public function setDestinoUsuario($destinoUsuario)
    {
        $this->destinoUsuario = $destinoUsuario;

        return $this;
    }

    /**
     * Get the value of destinoNome
     */
    public function getDestinoNome()
    {
        return $this->destinoNome;
    }

    /**
     * Set the value of destinoNome
     *
     * @return  self
     */
    public function setDestinoNome($destinoNome)
    {
        $this->destinoNome = $destinoNome;

        return $this;
    }

    /**
     * Get the value of destinoDocumento
     */
    public function getDestinoEmail()
    {
        return $this->destinoEmail;
    }

    /**
     * Set the value of destinoDocumento
     *
     * @return  self
     */
    public function setDestinoEmail($destinoEmail)
    {
        $this->destinoEmail = $destinoEmail;

        return $this;
    }

    /**
     * Get the value of dataCarbon
     */
    public function getDataCarbon()
    {
        $this->dataCarbon = new Carbon($this->data);
        return $this->dataCarbon;
    }

    /**
     * Set the value of dataCarbon
     *
     * @return  self
     */
    public function setDataCarbon($dataCarbon)
    {
        $this->dataCarbon = $dataCarbon;

        return $this;
    }
}
