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
