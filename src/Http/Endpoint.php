<?php

namespace BanPay\Http;

class Endpoint
{
    const HOMOLOGACAO_BASE_URL   = 'https://homologacao.banpay.com.br/api/';
    const PRODUCAO_BASE_URL      = 'https://WWW.banpay.com.br/api/';
    const CONSULTA_SALDO         = 'saldo';
    const CONSULTA_TRANSFERENCIA = 'transacao';
    const CONSULTA_USUARIO       = 'usuario';
    const REALIZA_TRANSFERENCIA  = 'transfere';
}
