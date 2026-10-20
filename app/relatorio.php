<?php

// puxa o arquivo onde estão as funções que eu uso no sistema
require_once __DIR__ . '/../includes/functions.php';

// verifica se quem está entrando nessa página fez login
require_once __DIR__ . '/../login/verifica_user.php';

// pega os produtos e pedidos que estão cadastrados no banco
$produtos = listar_produtos($conexao);
$pedidos = listar_pedidos($conexao);

// começa os valores dos produtos em zero
$quantidade_produtos = 0;
$total_estoque = 0;
$soma_precos = 0;

// passa por cada produto pra fazer as contas do relatório
foreach ($produtos as $produto) {

    // conta quantos produtos existem
    $quantidade_produtos++;

    // soma a quantidade que tem no estoque
    $total_estoque = $total_estoque + $produto['estoque'];

    // soma o preço de todos os produtos
    $soma_precos = $soma_precos + $produto['preco'];
}

// começa o preço médio em zero
$preco_medio = 0;

// só faz a divisão se tiver produto cadastrado
if ($quantidade_produtos > 0) {

    // calcula o preço médio dos produtos
    $preco_medio = $soma_precos / $quantidade_produtos;
}

// começa os valores dos pedidos em zero
$quantidade_pedidos = 0;
$total_pedidos = 0;

// passa por cada pedido pra contar e somar os valores
foreach ($pedidos as $pedido) {

    // conta quantos pedidos foram recebidos
    $quantidade_pedidos++;

    // soma o valor de todos os pedidos
    $total_pedidos = $total_pedidos + $pedido['total'];
}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/elis-patisserie/../style/style.css">

    <title>Relatório - Elis Patisserie</title>

</head>

<body>

    <?php

    // coloca o cabeçalho da parte administrativa
    include __DIR__ . '/../includes/header_admin.php';

    ?>

    <main>

        <section>

            <!-- título do relatório -->
            <h1>Relatório geral</h1>

            <p>Este relatório usa SELECT para buscar os registros e PHP para contar e calcular os totais.</p>

            <!-- tabela com os resultados principais do relatório -->
            <table>

                <tr>

                    <!-- nomes das colunas da tabela -->
                    <th>Informação</th>
                    <th>Resultado</th>

                </tr>

                <tr>

                    <!-- mostra quantos produtos estão cadastrados -->
                    <td>Produtos cadastrados</td>
                    <td><?php echo $quantidade_produtos; ?></td>

                </tr>

                <tr>

                    <!-- mostra a soma de tudo que tem no estoque -->
                    <td>Total em estoque</td>
                    <td><?php echo $total_estoque; ?></td>

                </tr>

                <tr>

                    <!-- mostra a média dos preços dos produtos -->
                    <td>Preço médio dos produtos</td>
                    <td>R$ <?php echo number_format($preco_medio, 2, ',', '.'); ?></td>

                </tr>

                <tr>

                    <!-- mostra quantos pedidos foram recebidos -->
                    <td>Pedidos recebidos</td>
                    <td><?php echo $quantidade_pedidos; ?></td>

                </tr>

                <tr>

                    <!-- mostra a soma do valor de todos os pedidos -->
                    <td>Valor total dos pedidos</td>
                    <td>R$ <?php echo number_format($total_pedidos, 2, ',', '.'); ?></td>

                </tr>

            </table>

        </section>

        <section>

            <!-- parte que mostra todos os produtos cadastrados -->
            <h2>Produtos cadastrados</h2>

            <table>

                <tr>

                    <!-- nomes das colunas da tabela de produtos -->
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Unidade</th>

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