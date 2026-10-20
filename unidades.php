<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/elis-patisserie/style/style.css">

    <title>Unidades - Elis Patisserie</title>

</head>

<body>

    <?php

    // coloca o cabeçalho principal do site
    include __DIR__ . '/includes/header.php';

    ?>

    <main>

        <section class="azul">

            <!-- título da página -->
            <h1>Escolha sua unidade</h1>

            <p>Selecione a unidade da Elis Patisserie que deseja consultar.</p>

            <!-- formulário usado pra escolher uma unidade -->
            <form action="" method="post">

                <label for="unidade">Unidade:</label>

                <!-- opções de unidades disponíveis -->
                <select name="unidade" id="unidade">

                    <option value="Americana - SP">Americana - SP</option>

                    <option value="Leblon - RJ">Leblon - RJ</option>

                    <option value="Monte Verde - MG">Monte Verde - MG</option>

                </select>

                <input type="submit" value="Selecionar">

            </form>

        </section>

        <?php

        // verifica se o formulário foi enviado
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            // guarda a unidade escolhida
            $unidade = $_POST['unidade'];

            // mostra as informações da unidade de Americana
            if ($unidade == "Americana - SP") {

        ?>

                <section class="rosa">

                    <h2>Americana - SP</h2>

                    <p>Avenida Brasil, nº 742 — Jardim Girassol, Americana📍</p>

                    <!-- leva a pessoa pro cardápio -->
                    <a class="botao" href="/elis-patisserie/cardapio.php">Ver cardápio</a>

                    <!-- leva a pessoa pra página de pedidos -->
                    <a class="botao" href="/elis-patisserie/delivery.php">Fazer pedido</a>

                </section>

        <?php

            // mostra as informações da unidade do Leblon
            } elseif ($unidade == "Leblon - RJ") {

        ?>

                <section class="rosa">

                    <h2>Leblon - RJ</h2>

                    <p>Rua Dias Ferreira, nº 318 — Leblon, Rio de Janeiro - RJ 📍</p>

                    <!-- leva a pessoa pro cardápio -->
                    <a class="botao" href="/elis-patisserie/cardapio.php">Ver cardápio</a>

                    <!-- leva a pessoa pra página de pedidos -->
                    <a class="botao" href="/elis-patisserie/delivery.php">Fazer pedido</a>

                </section>

        <?php

            // mostra as informações da unidade de Monte Verde
            } elseif ($unidade == "Monte Verde - MG") {

        ?>

                <section class="rosa">

                    <h2>Monte Verde - MG</h2>

                    <p>Avenida Monte Verde, nº 615 — Centro, Monte Verde (Camanducaia) - MG 📍</p>

                    <!-- leva a pessoa pro cardápio -->
                    <a class="botao" href="/elis-patisserie/cardapio.php">Ver cardápio</a>

                    <!-- leva a pessoa pra página de pedidos -->
                    <a class="botao" href="/elis-patisserie/delivery.php">Fazer pedido</a>

                </section>

        <?php

            }

        }

        ?>

    </main>

    <?php

    // coloca o rodapé da página
    include __DIR__ . '/includes/footer.php';

    ?>

</body>

</html>