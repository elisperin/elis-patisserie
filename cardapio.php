<?php

// puxa o arquivo onde estão as funções que eu uso no sistema
require_once __DIR__ . '/includes/functions.php';

// pega todos os produtos cadastrados no banco
$produtos = listar_produtos($conexao);

// começa os filtros vazios
$categoria = "";
$unidade = "";

// verifica se o formulário de filtro foi enviado
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // guarda a categoria escolhida
    $categoria = $_POST['categoria'];

    // guarda a unidade escolhida
    $unidade = $_POST['unidade'];

}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/elis-patisserie/style/style.css">

    <title>Cardápio - Elis Patisserie</title>

</head>

<body>

    <?php

    // coloca o cabeçalho principal do site
    include __DIR__ . '/includes/header.php';

    ?>

    <main>

        <section>

            <!-- título da página -->
            <h1>Cardápio</h1>

            <p>Escolha uma categoria e uma unidade para filtrar os produtos.</p>

            <!-- formulário usado pra filtrar os produtos -->
            <form action="" method="post">

                <!-- escolhe a categoria que a pessoa quer ver -->
                <label for="categoria">Categoria:</label>

                <select name="categoria" id="categoria">

                    <option value="">Todas</option>
                    <option value="Bolos e Tortas">Bolos e Tortas</option>
                    <option value="Confeitaria Fina">Confeitaria Fina</option>
                    <option value="Sobremesas Individuais">Sobremesas Individuais</option>
                    <option value="Kits Comemorativos">Kits Comemorativos</option>
                    <option value="Casamentos">Casamentos</option>

                </select>

                <br>

                <!-- escolhe a unidade que a pessoa quer ver -->
                <label for="unidade">Unidade:</label>

                <select name="unidade" id="unidade">

                    <option value="">Todas</option>
                    <option value="Americana - SP">Americana - SP</option>
                    <option value="Leblon - RJ">Leblon - RJ</option>
                    <option value="Monte Verde - MG">Monte Verde - MG</option>

                </select>

                <br>

                <input type="submit" value="Filtrar">

            </form>

        </section>

        <section>

            <!-- parte onde aparecem os produtos -->
            <h2>Nossas delícias</h2>

            <?php

            // passa por cada produto que veio do banco
            foreach ($produtos as $produto) {

                // começa considerando que o produto pode aparecer
                $mostrar = true;

                // se o produto não estiver ativo ele não aparece
                if (!$produto['ativo']) {

                    $mostrar = false;

                }

                // verifica se a categoria escolhida é a mesma do produto
                if ($categoria != "" && $produto['categoria'] != $categoria) {

                    $mostrar = false;

                }

                // verifica se a unidade escolhida é a mesma do produto
                if ($unidade != "" && $produto['unidade'] != $unidade) {

                    $mostrar = false;

                }

                // só mostra o produto se ele passou pelos filtros
                if ($mostrar) {

            ?>

                    <article>

                        <!-- mostra a imagem do produto -->
                        <img src="<?php echo $produto['imagem']; ?>" alt="Doce da Elis Patisserie" width="500">

                        <!-- mostra o nome do produto -->
                        <h2><?php echo $produto['nome']; ?></h2>

                        <!-- mostra as informações do produto -->
                        <p><?php echo $produto['descricao']; ?></p>

                        <p>Categoria: <?php echo $produto['categoria']; ?></p>

                        <p>Rendimento: <?php echo $produto['rendimento']; ?></p>

                        <p><strong>Alérgenos:</strong> <?php echo $produto['alergenos']; ?></p>

                        <p>Unidade: <?php echo $produto['unidade']; ?></p>

                        <p><strong>R$ <?php echo $produto['preco']; ?></strong></p>

                        <!-- leva a pessoa pra página de delivery -->
                        <a class="botao" href="delivery.php">Pedir agora</a>

                    </article>

            <?php

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