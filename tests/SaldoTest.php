<?php

namespace Tests;

use BanPay\Cliente;
use BanPay\Services\Consultas\Saldo;
use BanPay\Exceptions\BanPayException;

class SaldoTest extends TestCase
{
    public function testSaldoEmail()
    {
        $envToken = \getenv('TOKEN');

        $cliente = new Cliente;
        $cliente->setToken($envToken);
        $cliente->setVerifySSL(false);
        $cliente->setEnvironment('homologacao');

        $saldo = Saldo::get($cliente);

        $this->assertEquals($saldo->getEmail(), 'email@valido.com');
    }

    public function testSaldoDisponivel()
    {
        $envToken = \getenv('TOKEN');

        $cliente = new Cliente;
        $cliente->setToken($envToken);
        $cliente->setVerifySSL(false);
        $cliente->setEnvironment('homologacao');

        $saldo = Saldo::get($cliente);

        $this->assertEquals($saldo->getSaldoDisponivel(), 1038.59);
    }

    public function testSaldoWithException()
    {
        $this->expectException(BanPayException::class);

        $envToken = \getenv('TOKEN') . "x";
        $cliente = new Cliente;
        $cliente->setToken($envToken);

        Saldo::get($cliente);
    }
}
