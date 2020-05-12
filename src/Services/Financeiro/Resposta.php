<?php

namespace BankOn\Services\Financeiro;

class Resposta
{
    private $transacao;
    private $sucesso;
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
    public function getSucesso()
    {
        return $this->sucesso;
    }

    /**
     * Set the value of sucesso
     *
     * @return  self
     */
    public function setSucesso($sucesso)
    {
        $this->sucesso = $sucesso;

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
