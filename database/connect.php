<?php
$host = "192.168.10.16";
$dbname = "elis_patisserie";
$user = "patisserie"; // trocar na hr de por no github, por: root
$pass = "patisserie"; // trocar na hr de por no github, por: SUA_SENHA_AQUI

try {
    $conexao = new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $user,
        $pass
    );
    return $conexao;
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
