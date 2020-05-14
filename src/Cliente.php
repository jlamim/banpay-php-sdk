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
