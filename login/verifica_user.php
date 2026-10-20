<?php

// verifica se ainda não tem uma sessão iniciada
if (session_status() == PHP_SESSION_NONE) {

    // inicia a sessão pra conseguir verificar quem está logado
    session_start();

}

// verifica se não tem nenhum usuário logado
if (!isset($_SESSION['id'])) {

    // manda a pessoa de volta pra tela de login
    header("Location: ../login/login.php");

    // para o código depois do redirecionamento
    exit();

}

?>
