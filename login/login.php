<?php

// puxa o arquivo onde estão as funções que eu uso no sistema
require_once __DIR__ . '/../includes/functions.php';

// inicia a sessão pra conseguir guardar quem entrou na área administrativa
session_start();

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/elis-patisserie/../style/style.css">

    <title>Login - Elis Patisserie</title>

</head>

<body>

    <main>

        <section>

            <!-- título da página de login -->
            <h1>Área administrativa</h1>

            <!-- formulário usado pra entrar na área administrativa -->
            <form action="" method="post">

                <!-- campo pra digitar o e-mail -->
                <label for="email">E-mail:</label>

                <input type="email" name="email" id="email" required><br>

                <!-- campo pra digitar a senha -->
                <label for="senha">Senha:</label>

                <input type="password" name="senha" id="senha" required><br>

                <input type="submit" value="Entrar">

            </form>

            <?php

            // verifica se o formulário foi enviado
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                // procura no banco o usuário com o e-mail que foi digitado
                $usuario = consulta_user($conexao, $_POST['email']);

                // verifica se encontrou algum usuário
                if ($usuario) {

                    // compara o e-mail e a senha digitados com os dados do banco
                    if ($_POST['email'] == $usuario['email'] && $_POST['senha'] == $usuario['senha']) {

                        // guarda o ID do usuário na sessão
                        $_SESSION['id'] = $usuario['id'];

                        // manda a pessoa pro painel administrativo
                        header("Location: ../app/produto-listar.php");

                        // para o código depois do redirecionamento
                        exit();

                    } else {

                        // aparece se o e-mail ou a senha estiverem errados
                        echo "Usuário ou senha inválidos";

                    }

                } else {

                    // aparece se não encontrar esse usuário no banco
                    echo "Usuário ou senha inválidos";

                }

            }

            ?>

        </section>

    </main>

</body>

</html>