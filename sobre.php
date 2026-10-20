<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/elis-patisserie/style/style.css">

    <title>Sobre - Elis Patisserie</title>

</head>

<body>

    <?php

    // coloca o cabeçalho principal do site
    include __DIR__ . '/includes/header.php';

    ?>

    <main>

        <section>

            <!-- título da página -->
            <h1>Sobre a Elis</h1>

            <!-- imagem que representa os bastidores da confeitaria -->
            <img src="/elis-patisserie/imagens/eliscozinha.png" alt="Bastidores da Elis Patisserie" width="800">

            <!-- conta um pouco sobre como surgiu a ideia da confeitaria -->
            <p>A Elis Patisserie nasceu da vontade de unir técnica francesa, delicadeza e uma identidade retrô inspirada nos anos 50, 60 e 70.</p>

            <!-- fala um pouco sobre o que a marca valoriza -->
            <p>O projeto valoriza acabamento, ingredientes selecionados, cuidado artesanal e apresentação especial.</p>

        </section>

        <section class="azul">

            <!-- parte que fala um pouco sobre os bastidores -->
            <h2>Bastidores</h2>

            <p>Produção organizada, atenção aos detalhes e preparo cuidadoso fazem parte da experiência que a marca deseja transmitir.</p>

        </section>

    </main>

    <?php

    // coloca o rodapé da página
    include __DIR__ . '/includes/footer.php';

    ?>

</body>

</html>