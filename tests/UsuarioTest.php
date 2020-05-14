<?php

namespace Tests;

use BanPay\Cliente;
use BanPay\Services\Consultas\Usuario;
use BanPay\Exceptions\BanPayException;

class UsuarioTest extends TestCase
{
    public function testUsuarioExiste()
    {
        $envToken   = \getenv('TOKEN');
        $emailCheck = "email@valido.com";

        $cliente = new Cliente;
        $cliente->setToken($envToken);
        $cliente->setVerifySSL(false);
        $cliente->setEnvironment('homologacao');

        $usuario = Usuario::get($cliente, $emailCheck);

        $this->assertEquals($usuario->getEmail(), $emailCheck);
    }

    public function testUsuarioWithException()
    {
        $this->expectException(BanPayException::class);

        $envToken = \getenv('TOKEN');

        $cliente = new Cliente;
        $cliente->setToken($envToken);
        $cliente->setVerifySSL(false);
        $cliente->setEnvironment('homologacao');

        Usuario::get($cliente, 'email@invalido.com');
    }
}
