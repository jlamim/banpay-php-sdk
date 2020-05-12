<?php

namespace Tests;

use BanPay\Cliente;
use BanPay\Services\Financeiro\NovaTransferencia;
use BanPay\Services\Financeiro\Transferencia;
use BanPay\Exceptions\BanPayException;

class TransferenciaTest extends TestCase
{

    public function testNovaTransferencia()
    {
        $env_token = \getenv('TOKEN');
        $cliente = new Cliente;
        $cliente->setToken($env_token);
        $transferencia = new Transferencia;
        $transferencia->setContaDestino('user@test.com');
        $transferencia->setValor(1);
        $transferencia->setIdTransferencia('test');
        $novaTransferencia = new NovaTransferencia;
        $novaTransferencia->executar($cliente,$transferencia);
    }

    public function testNovaTransferenciaWithException()
    {
        $this->expectException(BanPayException::class);
        $env_token = \getenv('TOKENx');
        $cliente = new Cliente;
        $cliente->setToken($env_token);
        $transferencia = new Transferencia;
        $transferencia->setContaDestino('user@test.com');
        $transferencia->setValor(1);
        $transferencia->setIdTransferencia('test');
        $novaTransferencia = new NovaTransferencia;
        $novaTransferencia->executar($cliente, $transferencia);
    }
}
