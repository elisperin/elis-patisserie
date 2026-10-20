<?php

// puxa o arquivo onde estão as funções que eu uso no sistema
require_once __DIR__ . '/includes/functions.php';

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/elis-patisserie/style/style.css">

    <title>Monte seu bolo - Elis Patisserie</title>

</head>

<body>

    <?php

    // coloca o cabeçalho principal do site
    include __DIR__ . '/includes/header.php';

    ?>

    <main>

        <section>

            <!-- título da página -->
            <h1>Monte seu bolo 🎂</h1>


            <p>Use nossa calculadora para ter uma sugestão do tamanho do bolo.</p>

            <p>Valor do bolo personalizado: R$ 120,00 por kg.</p>

            <a class="botao" href="calculadora.php">Ir para a calculadora</a>
            

            <!-- formulário usado pra montar um bolo personalizado -->
            <form action="" method="post">

                <!-- dados da pessoa que está fazendo o pedido -->
                <label for="cliente">Nome:</label>

                <input type="text" name="cliente" id="cliente" required><br>

                <label for="email">E-mail:</label>

                <input type="email" name="email" id="email" required><br>

                <label for="telefone">Telefone:</label>

                <input type="tel" name="telefone" id="telefone" required><br>

                
                <!-- escolhe o peso do bolo de acordo com a sugestão da calculadora -->
                <label for="kg">Peso do bolo:</label>

                <select name="kg" id="kg">

                    <option value="1">1 kg</option>
                    <option value="2">2 kg</option>
                    <option value="4">4 kg</option>
                    <option value="6">6 kg</option>

                </select><br>

                <!-- escolhe a massa do bolo -->
                <label for="massa">Massa:</label>

                <select name="massa" id="massa">

                    <option value="Baunilha">Baunilha</option>

                    <option value="Chocolate">Chocolate</option>

                    <option value="Red Velvet">Red Velvet</option>

                </select><br>

                <!-- escolhe o recheio -->
                <label for="recheio">Recheio:</label>

                <select name="recheio" id="recheio">

                    <option value="Morango e creme">Morango e creme</option>

                    <option value="Chocolate">Chocolate</option>

                    <option value="Baunilha e frutas vermelhas">Baunilha e frutas vermelhas</option>

                </select><br>

                <!-- escolhe a cobertura -->
                <label for="cobertura">Cobertura:</label>

                <select name="cobertura" id="cobertura">

                    <option value="Chantilly">Chantilly</option>

                    <option value="Ganache">Ganache</option>

                    <option value="Creme de manteiga">Creme de manteiga</option>

                </select><br>

                <!-- escolhe o tipo de decoração -->
                <label for="decoracao">Decoração:</label>

                <select name="decoracao" id="decoracao">

                    <option value="Retrô com laços">Retrô com laços</option>

                    <option value="Frutas frescas">Frutas frescas</option>

                    <option value="Clássica francesa">Clássica francesa</option>

                </select><br>

                <!-- escolhe em qual unidade vai ser feito o pedido -->
                <label for="unidade">Unidade:</label>

                <select name="unidade" id="unidade">

                    <option value="Americana - SP">Americana - SP</option>

                    <option value="Leblon - RJ">Leblon - RJ</option>

                    <option value="Monte Verde - MG">Monte Verde - MG</option>

                </select><br>

                <!-- escolhe a data -->
                <label for="data_retirada">Data:</label>

                <input type="date" name="data_retirada" id="data_retirada" required><br>

                <!-- escolhe o período -->
                <label for="periodo">Período:</label>

                <select name="periodo" id="periodo">

                    <option value="Manhã">Manhã</option>

                    <option value="Tarde">Tarde</option>

                    <option value="Noite">Noite</option>

                </select><br>

                <!-- envia o pedido de orçamento -->
                <input type="submit" value="Enviar para orçamento">

            </form>

            <?php

            // verifica se o formulário foi enviado
    
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                // pega o peso que a pessoa escolheu
                $kg = $_POST['kg'];

                // cada kg do bolo custa 120 reais
                $total = $kg * 120;

                // junta as escolhas feitas pela pessoa em um texto só
                $produto = "Bolo personalizado - " . $kg . " kg - Massa: " . $_POST['massa'] . " - Recheio: " . $_POST['recheio'] . " - Cobertura: " . $_POST['cobertura'] . " - Decoração: " . $_POST['decoracao'];

                // cadastra o pedido com o preço calculado
                cadastrar_pedido($conexao, $_POST['cliente'], $_POST['email'], $_POST['telefone'], $produto, 1, $_POST['unidade'], "Orçamento personalizado", $_POST['data_retirada'], $_POST['periodo'], "Bolo montado pelo cliente", "Aguardando orçamento", $total);

                // mostra o resumo e o valor do bolo
                echo "<article>";

                echo "<h2>Pedido de orçamento enviado!</h2>";

                echo "<p>$produto</p>";

                echo "<p>Valor: R$ " . number_format($total, 2, ',', '.') . "</p>";

                echo "<p>A equipe da unidade " . $_POST['unidade'] . " poderá continuar o atendimento.</p>";

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