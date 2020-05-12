# BanPay PHP SDK

[![Build Status](https://travis-ci.org/jlamim/banpay-php-sdk.svg?branch=master)](https://travis-ci.org/jlamim/banpay-php-sdk)
[![Coverage Status](https://coveralls.io/repos/github/jlamim/banpay-php-sdk/badge.svg?branch=develop)](https://coveralls.io/github/jlamim/banpay-php-sdk?branch=master)
[![Downloads](https://poser.pugx.org/jlamim/banpay-php-sdk/downloads)](https://packagist.org/packages/jlamim/banpay-php-sdk)
[![GitHub release (latest by date)](https://img.shields.io/github/v/release/jlamim/banpay-php-sdk)](https://packagist.org/packages/jlamim/banpay-php-sdk)
[![GitHub stars](https://img.shields.io/github/stars/jlamim/banpay-php-sdk)](https://packagist.org/packages/jlamim/banpay-php-sdk)
[![GitHub license](https://img.shields.io/github/license/jlamim/banpay-php-sdk)](https://github.com/jlamim/banpay-php-sdk/blob/develop/license.txt)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/jlamim/banpay-php-sdk/pulls)
<br>

Essa biblioteca permite você se conectar com a API do BanPay através do seu sistema.

NÃO É uma biblioteca oficial, porém a considero funcional, pois sempre adiciono novas funcionalidades conforme a API evolui.

## Documentação da API

A documentação oficial da API pode ser encontrada em https://banpay.com.br/api.

## Instalação Via Composer

Caso não possua o Composer instalado em sua máquina ou ambiente, você pode seguir as instruções do site oficial do Composer em https://getcomposer.org/doc/00-intro.md.

Acesse o diretório raiz da sua aplicação pelo terminal e execute o comando a seguir para instalar a biblioteca:

```sh
composer require jlamim/banpay-php-sdk
```

Após instalar, inclua o autoloader em seu projeto:

```php
require_once 'vendor/autoload.php';
```

### Consulta a Saldo ###


```php
use BanPay\Cliente;
use BanPay\Services\Consultas\Saldo;
use BanPay\Exceptions\BanPayException;

$cliente = new Cliente;
$cliente->setToken("TOKEN");

try{
    $saldo = Saldo::get($cliente);

    echo $saldo->getSaldoDisponivel();
    echo $saldo->getUsuario();

}catch(BanPayException $e){
    echo $e->getMessage();
}
```

### Consulta a Transação (transferência) ###

```php
use BanPay\Cliente;
use BanPay\Services\Consultas\Transferencia;
use BanPay\Exceptions\BanPayException;

$cliente = new Cliente;
$cliente->setToken("TOKEN");

$codigo = "xxxxxxxx";

try{
    $transferencia = Transferencia::get($cliente,$codigo);

    echo $transferencia->getData();
    echo $transferencia->getValor();
    echo $transferencia->getOrigemUsuario();
    echo $transferencia->getOrigemNome();
    echo $transferencia->getOrigemEmail();
    echo $transferencia->getDestinoUsuario();
    echo $transferencia->getDestinoNome();
    echo $transferencia->getDestinoEmail();
    $transferencia->getDataCarbon();// retorna a data pra ser usada com a biblioteca https://carbon.nesbot.com/

}catch(BanPayException $e){
    echo $e->getMessage();
}
```

### Realizar Transferência ###

As transferências através da API do BanPay só podem ser realizadas a partir da conta de origem do token informado.

```php
use BanPay\Cliente;
use BanPay\Services\Financeiro\NovaTransferencia;
use BanPay\Services\Financeiro\Transferencia;
use BanPay\Exceptions\BanPayException;

$cliente = new Cliente;
$cliente->setToken("TOKEN");

$transferencia = new Transferencia;
$transferencia->setContaDestino('email@contadestino.com');
$transferencia->setValor(100.99);

try{
    $novaTransferencia = new NovaTransferencia;
    $resposta = $novaTransferencia->executar($cliente,$transferencia);

    echo $resposta->getTransacao();
    echo $resposta->getStatus();
    echo $resposta->getMensagem();

}catch(BanPayException $e){
    echo $e->getMessage();
}
```

Para verificar a transferência e obter mais detalhes sobre ela você pode utilizar o recurso de "Consulta a Transação" disponível na API e com suporte nessa biblioteca.

### Consulta a Usuário ###

EM BREVE!