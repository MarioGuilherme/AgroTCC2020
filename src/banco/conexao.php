<?php

    date_default_timezone_set("America/Sao_Paulo");

    $host  = 'localhost';
    $user  = 'root';
    $senha = 'root';
    $banco = 'sistema_agro_peps';

    $conexao = mysqli_connect($host, $user, $senha, $banco);
    mysqli_set_charset($conexao,"utf8");