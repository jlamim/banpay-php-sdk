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
        $transferencia = Transferencia::get($cliente, "c12f5a8092995b189104986c70a590eb");

        $this->assertTrue($transferencia->getStatus());
    }

    public function testNovaTransferenciaAssertFalseWithException()
    {
        $this->expectException(BanPayException::class);
        $envToken = \getenv('TOKEN');
        $cliente = new Cliente;
        $cliente->setToken($envToken);
        Transferencia::get($cliente, "c12f5a8092995b189104986c70a590eb");
    }
}
