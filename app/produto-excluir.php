<?php

// puxa o arquivo onde estão as funções que eu uso no sistema
require_once __DIR__ . '/../includes/functions.php';

// verifica se quem está entrando nessa página fez login
require_once __DIR__ . '/../login/verifica_user.php';

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/elis-patisserie/../style/style.css">

    <title>Excluir produto</title>

</head>

<body>

    <?php

    // coloca o cabeçalho da parte administrativa
    include __DIR__ . '/../includes/header_admin.php';

    ?>

    <main>

        <section>

            <!-- título da página -->
            <h1>Excluir produto</h1>

            <!-- aviso pra conferir o ID antes de apagar o produto -->
            <p>Use o DELETE com cuidado. Confirme o ID antes de excluir.</p>

            <!-- formulário usado pra excluir um produto pelo ID -->
            <form action="" method="post">

                <!-- campo onde eu coloco o ID do produto que quero excluir -->
                <label for="id">ID:</label><input type="number" name="id" id="id" min="1" required>

                <input type="submit" value="Excluir">

            </form>

            <?php

            // verifica se o formulário foi enviado
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                // exclui do banco o produto com o ID que foi informado
                deletar_produto($conexao, $_POST['id']);

            }

            ?>

        </section>

    </main>

    <?php

    // coloca o rodapé da página
    include __DIR__ . '/../includes/footer.php';

    ?>

</body>

</html>