<?php

namespace BanPay;

class Cliente
{
    private $token;
    private $verifySSL   = true;
    private $environment = 'producao';

    /**
     * Get the value of token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of verifySSL
     */
    public function getVerifySSL()
    {
        return $this->verifySSL;
    }

    /**
     * Set the value of verifySSL
     *
     * @return  self
     */
    public function setVerifySSL($verifySSL)
    {
        $this->verifySSL = $verifySSL;

        return $this;
    }

    /**
     * Get the value of environment
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Set the value of environment
     *
     * @return  self
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;

        return $this;
    }
}
