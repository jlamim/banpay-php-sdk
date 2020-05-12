<?php

namespace BanPay\Services\Financeiro;

class Resposta
{
    private $transacao;
    private $status;
    private $mensagem;

    /**
     * Get the value of transacao
     */
    public function getTransacao()
    {
        return $this->transacao;
    }

    /**
     * Set the value of transacao
     *
     * @return  self
     */
    public function setTransacao($transacao)
    {
        $this->transacao = $transacao;

        return $this;
    }

    /**
     * Get the value of sucesso
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of mensagem
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }

    /**
     * Set the value of mensagem
     *
     * @return  self
     */
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;

        return $this;
    }
}
