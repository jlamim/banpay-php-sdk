<?php

namespace BanPay\Services\Financeiro;

class Transferencia
{
    private $contaDestino;
    private $valor;    

    /**
     * Get the value of beneficiario
     */
    public function getContaDestino()
    {
        return $this->contaDestino;
    }

    /**
     * Set the value of beneficiario
     *
     * @return  self
     */
    public function setContaDestino($contaDestino)
    {
        $this->contaDestino = $contaDestino;

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
}
