<?php

// puxa o arquivo onde estão as funções que eu uso no sistema
require_once __DIR__ . '/includes/functions.php';

// pega só os produtos que estão ativos
$produtos = listar_produtos_ativos($conexao);

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/elis-patisserie/style/style.css">

    <title>Delivery - Elis Patisserie</title>

</head>

<body>

    <?php

    // coloca o cabeçalho principal do site
    include __DIR__ . '/includes/header.php';

    ?>

    <main>

        <section>

            <!-- título da página -->
            <h1>Delivery e retirada</h1>

            <!-- formulário usado pra fazer um pedido -->
            <form action="" method="post">

                <!-- dados da pessoa que está fazendo o pedido -->
                <label for="cliente">Nome:</label>

                <input type="text" name="cliente" id="cliente" required><br>

                <label for="email">E-mail:</label>

                <input type="email" name="email" id="email" required><br>

                <label for="telefone">Telefone:</label>

                <input type="tel" name="telefone" id="telefone" required><br>

                <!-- escolhe um dos produtos que estão ativos -->
                <label for="produto_id">Produto:</label>

                <select name="produto_id" id="produto_id">

                    <?php

                    // passa por cada produto pra colocar ele como opção
                    foreach ($produtos as $produto) {

                    ?>

                        <option value="<?php echo $produto['id']; ?>"><?php echo $produto['nome']; ?> - <?php echo $produto['unidade']; ?></option>

                    <?php

                    }

                    ?>

                </select><br>

                <!-- quantidade que a pessoa quer pedir -->
                <label for="quantidade">Quantidade:</label>

                <input type="number" name="quantidade" id="quantidade" min="1" value="1" required><br>

                <!-- escolhe em qual unidade o pedido vai ser feito -->
                <label for="unidade">Unidade:</label>

                <select name="unidade" id="unidade">

                    <option value="Americana - SP">Americana - SP</option>

                    <option value="Leblon - RJ">Leblon - RJ</option>

                    <option value="Monte Verde - MG">Monte Verde - MG</option>

                </select><br>

                <!-- escolhe se vai ser delivery ou retirada -->
                <label for="tipo_recebimento">Recebimento:</label>

                <select name="tipo_recebimento" id="tipo_recebimento">

                    <option value="Delivery">Delivery</option>

                    <option value="Retirada">Retirada</option>

                </select><br>

                <!-- escolhe a data do pedido -->
                <label for="data_retirada">Data:</label>

                <input type="date" name="data_retirada" id="data_retirada" required><br>

                <!-- escolhe o período -->
                <label for="periodo">Período:</label>

                <select name="periodo" id="periodo">

                    <option value="Manhã">Manhã</option>

                    <option value="Tarde">Tarde</option>

                    <option value="Noite">Noite</option>

                </select><br>

                <!-- campo pra colocar alguma observação -->
                <label for="observacao">Observação curta:</label>

                <input type="text" name="observacao" id="observacao"><br>

                <!-- limpa os campos ou envia o pedido -->
                <input type="reset" value="Limpar">

                <input type="submit" value="Finalizar pedido">

            </form>

            <?php

            // verifica se o formulário foi enviado
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                // procura no banco o produto que a pessoa escolheu
                $produto_escolhido = consultar_produto($conexao, $_POST['produto_id']);

                // verifica se encontrou o produto
                if ($produto_escolhido) {

                    // verifica se a unidade escolhida é a mesma do produto
                    if ($_POST['unidade'] == $produto_escolhido['unidade']) {

                        // calcula o valor total do pedido
                        $total = $produto_escolhido['preco'] * $_POST['quantidade'];

                        // cadastra o pedido no banco com os dados preenchidos
                        cadastrar_pedido($conexao, $_POST['cliente'], $_POST['email'], $_POST['telefone'], $produto_escolhido['nome'], $_POST['quantidade'], $_POST['unidade'], $_POST['tipo_recebimento'], $_POST['data_retirada'], $_POST['periodo'], $_POST['observacao'], "Recebido", $total);

                        // mostra um resumo do pedido que foi cadastrado
                        echo "<article><h2>Pedido cadastrado!</h2><p>Produto: {$produto_escolhido['nome']}</p><p>Total: R$ " . number_format($total, 2, ',', '.') . "</p></article>";

                    } else {

                        // aparece se a unidade escolhida for diferente da unidade do produto
                        echo "<article><p>Escolha a mesma unidade informada ao lado do produto.</p></article>";

                    }

                }

            }

            ?>

        </section>

    </main>

    <?php

    // coloca o rodapé da página
    include __DIR__ . '/includes/footer.php';

    ?>

</body>

</html>
