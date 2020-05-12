<?php

namespace Tests;

use BanPay\Cliente;
use BanPay\Services\Consultas\Saldo;
use BanPay\Exceptions\BanPayException;

class SaldoTest extends TestCase
{
    public function testSaldo()
    {
        $envToken = \getenv('TOKEN');
        $envUsuario = \getenv('SEU_USUARIO');

        $cliente = new Cliente;
        $cliente->setToken($envToken);

        $saldo = Saldo::get($cliente);

        $this->assertEquals($saldo->getUsuario(), $envUsuario);
    }

    public function testSaldoWithException()
    {
        $this->expectException(BanPayException::class);

        $envToken = \getenv('TOKEN')."x";
        $cliente = new Cliente;
        $cliente->setToken($envToken);

        Saldo::get($cliente);

    }
}
