<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Temperatura</title>
    <link rel="stylesheet" href="estilos/temperatura.css">
</head>
<body>

<header>
    <h1>Conversor de Temperatura</h1>
</header>

<main>
    <section id="conteudoPrincipal">
        <form action="temperatura.php" method="post">
            <label for="valor">Digite a temperatura:</label><br>
            <input type="number" id="valor" name="valor" required placeholder="ex: 30"> <br><br>

            <label>De:</label>
            <select name="de" class="de">
                <option value="celsius">Celsius</option>
                <option value="fahrenheit">Fahrenheit</option>
                <option value="kelvin">Kelvin</option>
            </select><br><br>

            <label>Para:</label>
            <select name="para">
                <option value="celsius">Celsius</option>
                <option value="fahrenheit">Fahrenheit</option>
                <option value="kelvin">Kelvin</option>
            </select><br><br>

            <button type="submit" id="converter">Converter</button>
        </form>
        <br>
        <a href="index.html"><button id="voltar">Voltar para Tela Principal</button></a>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valor = $_POST["valor"];
            $de = $_POST["de"];
            $para = $_POST["para"];

            if ($de === $para) {
                echo "<p>O valor continua o mesmo: <strong>$valor °$para</strong></p>";
            } else {
                $resultado = 0;

                if ($de === "fahrenheit") {
                    $valor = ($valor - 32) * 5/9;
                } elseif ($de === "kelvin") {
                    $valor = $valor - 273.15;
                }

                if ($para === "fahrenheit") {
                    $resultado = ($valor * 9/5) + 32;
                    echo "<p>Resultado: <strong>$resultado °F</strong></p>";
                } elseif ($para === "kelvin") {
                    $resultado = $valor + 273.15;
                    echo "<p>Resultado: <strong>$resultado K</strong></p>";
                } elseif ($para === "celsius") {
                    echo "<p>Resultado: <strong>$valor °C</strong></p>";
                }
            }
        }

        ?> 
    </section>

    <p>A temperatura, seja ela muito alta ou muito baixa, representa um perigo significativo para o corpo humano e para o funcionamento de sistemas e equipamentos. O corpo humano, em particular, possui uma faixa de temperatura ideal (homeostase, em torno de 36,5°C a 37,5°C) na qual todas as suas funções vitais operam de maneira eficiente. Fora dessa faixa, os riscos à saúde se tornam graves.</p>   

</main>

</body>
</html>