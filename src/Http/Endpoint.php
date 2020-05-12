<?php

namespace BanPay\Http;

class Endpoint
{
    const BASE_URL               = 'https://homologacao.banpay.com.br/api/';
    const CONSULTA_SALDO         = 'saldo';
    const CONSULTA_TRANSFERENCIA = 'transacao';
    const CONSULTA_USUARIO       = 'usuario';
    const REALIZA_TRANSFERENCIA  = 'transfere';
}
