<?php

namespace Tests;

use BanPay\Cliente;
use BanPay\Services\Financeiro\NovaTransferencia;
use BanPay\Services\Financeiro\Transferencia;
use BanPay\Exceptions\BanPayException;

class TransferenciaTest extends TestCase
{

    public function testNovaTransferenciaAssertTrue()
    {
        $envToken = \getenv('TOKEN');

        $cliente = new Cliente;
        $cliente->setToken($envToken);
        $cliente->setVerifySSL(false);
        $cliente->setEnvironment('homologacao');

        $transferencia = new Transferencia;
        $transferencia->setContaDestino('email@valido.com');
        $transferencia->setValor(1);
        $novaTransferencia = new NovaTransferencia;

        $retorno = $novaTransferencia->executar($cliente, $transferencia);
        $this->assertTrue($retorno->getStatus());
    }

    public function testNovaTransferenciaAssertFalseWithException()
    {
        $this->expectException(BanPayException::class);
        $envToken = \getenv('TOKEN');
        $cliente = new Cliente;
        $cliente->setToken($envToken);
        $transferencia = new Transferencia;
        $transferencia->setContaDestino('email@invalido.com');
        $transferencia->setValor(1);
        $novaTransferencia = new NovaTransferencia;
        $novaTransferencia->executar($cliente, $transferencia);
    }
}
