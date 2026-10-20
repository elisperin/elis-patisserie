<?php

// puxa o arquivo onde estão as funções que eu uso no sistema
require_once __DIR__ . '/includes/functions.php';

// pega os produtos ativos pra mostrar como destaque na página inicial
$destaques = listar_produtos_ativos($conexao);

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/elis-patisserie/style/style.css">

    <title>Elis Patisserie</title>

</head>

<body>

    <?php

    // coloca o cabeçalho principal do site
    include __DIR__ . '/includes/header.php';

    ?>

    <main>

        <section class="destaque">

            <!-- imagem principal da página inicial -->
            <img src="/elis-patisserie/imagens/dosura.png" alt="Elis Patisserie em estilo retrô" width="850">

            <!-- frase principal da confeitaria -->
            <h1>A delicadeza da confeitaria francesa em cada detalhe</h1>

            <p>Bolos, macarons, petit fours, sobremesas e presentes preparados para transformar momentos especiais.</p>

            <!-- botões principais da página -->
            <a class="botao" href="/elis-patisserie/cardapio.php">Ver cardápio</a>

            <a class="botao" href="/elis-patisserie/delivery.php">Pedir agora</a>

        </section>

        <section>

            <!-- parte onde aparecem alguns produtos em destaque -->
            <h2>Mais pedidos</h2>

            <?php

            // começa o contador em zero
            $contador = 0;

            // passa por cada produto ativo
            foreach ($destaques as $produto) {

                // mostra no máximo 4 produtos
                if ($contador < 4) {

            ?>

                    <article>

                        <!-- mostra a imagem do produto -->
                        <img src="<?php echo $produto['imagem']; ?>" alt="Produto da Elis Patisserie" width="500">

                        <!-- mostra o nome do produto -->
                        <h3><?php echo $produto['nome']; ?></h3>

                        <!-- mostra as informações principais do produto -->
                        <p><?php echo $produto['descricao']; ?></p>

                        <p><strong>R$ <?php echo $produto['preco']; ?></strong></p>

                        <p>Unidade: <?php echo $produto['unidade']; ?></p>

                    </article>

            <?php

                    // aumenta o contador depois de mostrar um produto
                    $contador++;

                }

            }

            ?>

        </section>

        <section class="azul">

            <!-- fala um pouco sobre os ingredientes usados -->
            <h2>Ingredientes selecionados</h2>

            <p>Chocolate nobre importado, manteiga de qualidade, frutas frescas e cuidado artesanal em cada receita.</p>

        </section>

        <section class="rosa">

            <!-- mostra algumas ocasiões em que a pessoa pode pedir os produtos -->
            <h2>Escolha pelo seu momento</h2>

            <p>🎂 Aniversários | 💍 Casamentos | 🎁 Presentes | 🎀 Datas comemorativas | 🍰 Um doce para o dia</p>

        </section>

        <section>

            <!-- comentario de cliente -->
            <h2>Avaliação de cliente</h2>

            <p>"Tudo chegou lindo e muito gostoso. A embalagem parecia um presente!" - Eloa Munhoz.</p>

            <!-- estrelas -->
            <p>⭐⭐⭐⭐⭐</p>

        </section>



    </main>

    <?php

    // coloca o rodapé da página
    include __DIR__ . '/includes/footer.php';

    ?>

</body>

</html>