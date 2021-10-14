<?php

function processa_mensagem($msg)
{
    preg_match_all('/@([a-zA-Z])*/', $msg, $regex);
    $regex = array_unique($regex[0]);
    $regex = array_map(
        function ($value) {
            $value = substr($value, 1);
            return $value;
        },
        $regex
    );
    return $regex;
}
$mensagem = "Prezado @, gostaria de solicitar autorização para @Fulano realizar a
operação de débito da conta de @Ciclano e crédito na conta de @Beltrano.
Atenciosamente, @Fulano";
$contas = processa_mensagem($mensagem);
print_r($contas);
