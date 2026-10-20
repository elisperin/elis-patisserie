<?php

// puxa o arquivo onde estão as funções que eu uso no sistema
require_once __DIR__ . '/../includes/functions.php';

// verifica se quem está entrando nessa página fez login
require_once __DIR__ . '/../login/verifica_user.php';

// pega todos os pedidos que estão cadastrados no banco
$pedidos = listar_pedidos($conexao);

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/elis-patisserie/../style/style.css">

    <title>Pedidos</title>

</head>

<body>

    <?php

    // coloca o cabeçalho da parte administrativa
    include __DIR__ . '/../includes/header_admin.php';

    ?>

    <main>

        <section>

            <!-- título da parte onde aparecem os pedidos -->
            <h1>Pedidos</h1>

            <!-- tabela onde vão aparecer os dados dos pedidos -->
            <table>

                <tr>

                    <!-- nomes das colunas da tabela -->
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Produto</th>
                    <th>Qtd.</th>
                    <th>Unidade</th>
                    <th>Data</th>
                    <th>Status</th>
                    <th>Total</th>

                </tr>

                <?php

                // passa por cada pedido que veio do banco
                foreach ($pedidos as $pedido) {

                ?>

                    <tr>

                        <!-- mostra as informações de cada pedido -->
                        <td><?php echo $pedido['id']; ?></td>
                        <td><?php echo $pedido['cliente']; ?></td>
                        <td><?php echo $pedido['produto']; ?></td>
                        <td><?php echo $pedido['quantidade']; ?></td>
                        <td><?php echo $pedido['unidade']; ?></td>
                        <td><?php echo $pedido['data_retirada']; ?></td>
                        <td><?php echo $pedido['status']; ?></td>
                        <td>R$ <?php echo $pedido['total']; ?></td>

                    </tr>

                <?php

                }

                ?>

            </table>

        </section>

        <section>

            <!-- mudar o status de um pedido -->
            <h2>Atualizar status</h2>

            <form action="" method="post">

                <!-- pede o ID do pedido que vai ser atualizado -->
                <label for="id">ID do pedido:</label><input type="number" name="id" id="id" min="1" required><br>

                <!-- escolhe qual vai ser o novo status do pedido -->
                <label for="status">Status:</label>

                <select name="status" id="status">

                    <option value="Recebido">Recebido</option>
                    <option value="Em produção">Em produção</option>
                    <option value="Pronto">Pronto</option>
                    <option value="Finalizado">Finalizado</option>

                </select><br>

                <input type="submit" value="Atualizar status">

            </form>

            <?php

            // verifica se o formulário foi enviado
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                // atualiza o status do pedido pelo ID que foi informado
                atualizar_status_pedido($conexao, $_POST['id'], $_POST['status']);

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