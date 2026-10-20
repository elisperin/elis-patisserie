<?php

// puxa o arquivo onde estão as funções que eu uso no sistema
require_once __DIR__ . '/includes/functions.php';

// pega só os produtos da categoria de kits comemorativos
$produtos = listar_produtos_categoria($conexao, "Kits Comemorativos");

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/elis-patisserie/style/style.css">

    <title>Kits - Elis Patisserie</title>

</head>

<body>

    <?php

    // coloca o cabeçalho principal do site
    include __DIR__ . '/includes/header.php';

    ?>

    <main>

        <section class="rosa">

            <!-- título principal da página -->
            <h1>Kits de Datas Comemorativas 🎀</h1>

            <p>Presentes especiais para Halloween, Dia dos Namorados, Páscoa, Natal e aniversários.</p>

            <!-- imagem principal dos kits -->
            <img src="/elis-patisserie/imagens/capakit.png" alt="Kits comemorativos Elis Patisserie" width="600">

        </section>

        <section class="destaque">

            <!-- mostra algumas datas em que os kits podem ser usados -->
            <h2>Datas especiais</h2>

            <p>🎃 Halloween | 💌 Dia dos Namorados | 🐰 Páscoa | 🎄 Natal | 🎂 Aniversário</p>

        </section>

        <section>

            <!-- parte onde aparecem os kits disponíveis -->
            <h2>Kits disponíveis</h2>

            <?php

            // verifica se encontrou algum produto dessa categoria
            if ($produtos) {

                // passa por cada kit encontrado
                foreach ($produtos as $produto) {

                    // só mostra o produto se ele estiver ativo
                    if ($produto['ativo']) {

            ?>

                    <article>

                        <!-- mostra a imagem do kit -->
                        <img src="<?php echo $produto['imagem']; ?>" alt="Kit Elis Patisserie" width="500">

                        <!-- mostra o nome do kit -->
                        <h2><?php echo $produto['nome']; ?></h2>

                        <!-- mostra as informações do kit -->
                        <p><?php echo $produto['descricao']; ?></p>

                        <p>Rendimento: <?php echo $produto['rendimento']; ?></p>

                        <p><strong>Alérgenos:</strong> <?php echo $produto['alergenos']; ?></p>

                        <p>Unidade: <?php echo $produto['unidade']; ?></p>

                        <p><strong>R$ <?php echo $produto['preco']; ?></strong></p>

                        <!-- leva a pessoa pra página de delivery -->
                        <a class="botao" href="delivery.php">Pedir pelo Delivery</a>

                    </article>

            <?php

                    }

                }

            } else {

                // aparece se não tiver nenhum kit cadastrado
                echo "<p>Nenhum kit disponível no momento.</p>";

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