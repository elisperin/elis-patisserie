<?php

// puxa o arquivo onde estão as funções que eu uso no sistema
require_once __DIR__ . '/includes/functions.php';

// pega só os produtos da categoria de casamentos
$produtos = listar_produtos_categoria($conexao, "Casamentos");

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/style.css">

    <title>Casamentos - Elis Patisserie</title>

</head>

<body>

    <?php

    // coloca o cabeçalho principal do site
    include __DIR__ . '/includes/header.php';

    ?>

    <main>

        <section class="azul">

            <!-- título principal da página -->
            <h1>Doces para Casamentos 💍</h1>

            <!-- imagem da parte de casamentos -->
            <img src="/elis-patisserie/imagens/casamento.jpg" alt="Doces finos para casamento" width="600">

            <p>Bolos, macarons, petit fours, minibolos e sobremesas inspiradas na confeitaria francesa.</p>

        </section>

        <section class="rosa">

            <!-- explica como os doces podem ser usados no evento -->
            <h2>Para o seu evento</h2>

            <p>As opções podem compor a mesa de doces, lembranças ou momentos especiais da celebração.</p>

        </section>

        <section>

            <!-- parte onde aparecem os produtos de casamento -->
            <h2>Opções disponíveis</h2>

            <?php

            // verifica se encontrou algum produto dessa categoria
            if ($produtos) {

                // passa por cada produto encontrado
                foreach ($produtos as $produto) {

                    // só mostra o produto se ele estiver ativo
                    if ($produto['ativo']) {

            ?>

                    <article>

                        <!-- mostra a imagem do produto -->
                        <img src="<?php echo $produto['imagem']; ?>" alt="Doce para casamento" width="500">

                        <!-- mostra o nome do produto -->
                        <h2><?php echo $produto['nome']; ?></h2>

                        <!-- mostra as informações do produto -->
                        <p><?php echo $produto['descricao']; ?></p>

                        <p>Rendimento: <?php echo $produto['rendimento']; ?></p>

                        <p><strong>Alérgenos:</strong> <?php echo $produto['alergenos']; ?></p>

                        <p>Unidade: <?php echo $produto['unidade']; ?></p>

                        <p><strong>R$ <?php echo $produto['preco']; ?></strong></p>

                        <!-- leva a pessoa pra página de contato -->
                        <a class="botao" href="contato.php">Solicitar informações</a>

                    </article>

            <?php

                    }

                }

            } else {

                // aparece se não tiver nenhum produto dessa categoria
                echo "<p>Nenhuma opção de casamento disponível no momento.</p>";

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