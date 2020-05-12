<?php

namespace BanPay\Services\Financeiro;

class Resposta
{
    private $hashTransacao;
    private $status;
    private $mensagem;

    /**
     * Get the value of transacao
     */
    public function getHashTransacao()
    {
        return $this->hashTransacao;
    }

    /**
     * Set the value of transacao
     *
     * @return  self
     */
    public function setHashTransacao($hashTransacao)
    {
        $this->hashTransacao = $hashTransacao;

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
