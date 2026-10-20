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

    <title>Consultar produto</title>

</head>

<body>

    <?php

    // coloca o cabeçalho da parte administrativa
    include __DIR__ . '/../includes/header_admin.php';

    ?>

    <main>

        <section>

            <!-- título da página -->
            <h1>Consultar produto por ID</h1>

            <!-- formulário usado pra procurar um produto pelo ID -->
            <form action="" method="post">

                <!-- campo onde eu coloco o ID do produto que quero procurar -->
                <label for="id">ID:</label><input type="number" name="id" id="id" min="1" required>

                <input type="submit" value="Consultar">

            </form>

            <?php

            // verifica se o formulário foi enviado
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                // procura no banco o produto com o ID que foi informado
                $produto = consultar_produto($conexao, $_POST['id']);

                // verifica se o produto foi encontrado
                if ($produto) {

                    // mostra os dados do produto encontrado
                    echo "<article>";

                    echo "<p>ID: {$produto['id']}</p>";

                    echo "<p>Nome: {$produto['nome']}</p>";

                    echo "<p>Categoria: {$produto['categoria']}</p>";

                    echo "<p>Preço: R$ " . $produto['preco'] . "</p>";

                    echo "<p>Estoque: {$produto['estoque']}</p>";

                    echo "<p>Unidade: {$produto['unidade']}</p>";

                    echo "</article>";

                } else {

                    // aparece caso não tenha nenhum produto com esse ID
                    echo "Produto não encontrado.";

                }

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