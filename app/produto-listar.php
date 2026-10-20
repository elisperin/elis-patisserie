<?php

// puxa o arquivo onde estão as funções que eu uso no sistema
require_once __DIR__ . '/../includes/functions.php';

// verifica se quem está entrando nessa página fez login
require_once __DIR__ . '/../login/verifica_user.php';

// pega todos os produtos que estão cadastrados no banco
$produtos = listar_produtos($conexao);

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/elis-patisserie/../style/style.css">

    <title>Produtos</title>

</head>

<body>

    <?php

    // coloca o cabeçalho da parte administrativa
    include __DIR__ . '/../includes/header_admin.php';

    ?>

    <main>

        <section>

            <!-- título da página -->
            <h1>Relatório de produtos</h1>

            <!-- tabela onde vão aparecer os produtos cadastrados -->
            <table>

                <tr>

                    <!-- nomes das colunas da tabela -->
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Unidade</th>
                    <th>Ativo</th>

                </tr>

                <?php

                // passa por cada produto que veio do banco
                foreach ($produtos as $produto) {

                ?>

                    <tr>

                        <!-- mostra as informações de cada produto -->
                        <td><?php echo $produto['id']; ?></td>
                        <td><?php echo $produto['nome']; ?></td>
                        <td><?php echo $produto['categoria']; ?></td>
                        <td>R$ <?php echo $produto['preco']; ?></td>
                        <td><?php echo $produto['estoque']; ?></td>
                        <td><?php echo $produto['unidade']; ?></td>
                        <td><?php echo $produto['ativo']; ?></td>

                    </tr>

                <?php

                }

                ?>

            </table>

        </section>

    </main>

    <?php

    // coloca o rodapé da página
    include __DIR__ . '/../includes/footer.php';

    ?>

</body>

</html>