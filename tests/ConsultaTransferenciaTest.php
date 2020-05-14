<?php

namespace Tests;

use BanPay\Cliente;
use BanPay\Services\Consultas\Transferencia;
use BanPay\Exceptions\BanPayException;

class ConsultaTransferenciaTest extends TestCase
{

    public function testConsultaTransferenciaAssertTrue()
    {
        $envToken = \getenv('TOKEN');

        $cliente = new Cliente;
        $cliente->setToken($envToken);
        $cliente->setVerifySSL(false);
        $cliente->setEnvironment('homologacao');

        $transferencia = Transferencia::get($cliente, "hash-valido");

        $this->assertTrue($transferencia->getStatus());
    }

    public function testNovaTransferenciaAssertFalseWithException()
    {
        $this->expectException(BanPayException::class);

        $envToken = \getenv('TOKEN');

        $cliente = new Cliente;
        $cliente->setToken($envToken);

        Transferencia::get($cliente, "hash-invalido");
    }
}
