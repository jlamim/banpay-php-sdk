<?php

namespace Tests;

use BanPay\Cliente;
use BanPay\Services\Consultas\Saldo;
use BanPay\Exceptions\BanPayException;

class SaldoTest extends TestCase
{
    public function testSaldo()
    {
        $env_token = \getenv('TOKEN');
        $env_usuario = \getenv('SEU_USUARIO');

        $cliente = new Cliente;
        $cliente->setTokenConsulta($env_token);

        $saldo = Saldo::get($cliente);

        $this->assertEquals($saldo->getUsuario(), $env_usuario);
    }

    public function testSaldoWithException()
    {
        $this->expectException(BanPayException::class);
        $env_token = \getenv('TOKENx');

        $cliente = new Cliente;
        $cliente->setToken($env_token);

        Saldo::get($cliente);
    }
}
