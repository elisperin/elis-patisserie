<?php

// verifica se ainda não tem uma sessão iniciada
if (session_status() == PHP_SESSION_NONE) {

    // inicia a sessão pra conseguir mexer nos dados dela
    session_start();

}

// limpa tudo que estava salvo na sessão
$_SESSION = array();

// encerra a sessão
session_destroy();

// manda a pessoa de volta pra página de login
header("Location: login.php");

// para o código depois do redirecionamento
exit();

?>