<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/elis-patisserie/style/style.css">

    <title>Calculadora - Elis Patisserie</title>

</head>

<body>

    <?php

    // coloca o cabeçalho principal do site
    include __DIR__ . '/includes/header.php';

    ?>

    <main>

        <section>

            <!-- título da calculadora -->
            <h1>Calculadora de bolo e docinhos</h1>

            <!-- formulário usado pra colocar a quantidade de convidados -->
            <form action="" method="post">

                <label for="convidados">Número de convidados:</label>

                <!-- campo onde a pessoa informa quantos convidados vão ter -->
                <input type="number" name="convidados" id="convidados" min="1" required>

                <br>

                <!-- envia o número de convidados pra fazer o cálculo -->
                <input type="submit" value="Calcular sugestão">

            </form>

            <?php

            // verifica se o formulário foi enviado
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                // pega a quantidade de convidados que foi informada
                $convidados = $_POST['convidados'];

                // começa a parte onde vai aparecer o resultado
                echo "<article>";

                // mostra pra quantas pessoas a sugestão foi feita
                echo "<h2>Sugestão para $convidados convidados</h2>";

                // verifica a quantidade de convidados e mostra uma sugestão
                if ($convidados <= 10) {

                    echo "<p>Bolo sugerido: 1 kg</p>
                    <p>Docinhos sugeridos: 40 unidades</p>";

                } elseif ($convidados <= 20) {

                    echo "<p>Bolo sugerido: 2 kg</p>
                    <p>Docinhos sugeridos: 80 unidades</p>";

                } elseif ($convidados <= 40) {

                    echo "<p>Bolo sugerido: 4 kg</p>
                    <p>Docinhos sugeridos: 160 unidades</p>";

                } elseif ($convidados <= 60) {

                    echo "<p>Bolo sugerido: 6 kg</p>
                    <p>Docinhos sugeridos: 240 unidades</p>";

                } else {

                    // aparece quando a quantidade de convidados é maior que 60
                    echo "<p>Para eventos maiores, recomendamos um orçamento personalizado.</p>";

                }

                // fecha a parte onde aparece o resultado
                echo "</article>";

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