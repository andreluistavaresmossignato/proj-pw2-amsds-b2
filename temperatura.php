<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Temperatura</title>
    <link rel="stylesheet" href="estilos/temperatura.css">
</head>
<bodyz>

<header>
    <h1>Conversor de Temperatura</h1>
</header>

<main>
    <section id="conteudoPrincipal">
        <form action="temperatura.php" method="post">
            <label for="valor">Digite a temperatura:</label><br>
            <div class="caixa-input">
            <input type="number" id="valor" name="valor" required placeholder="ex: 30"> <br><br>
            </div>

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
        
        $celsiusConvertido = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valor = $_POST["valor"];
            $de = $_POST["de"];
            $para = $_POST["para"];
            $tipo = 0;
            $resultado = 0;

            if ($de === $para) {
                echo "<p>O valor continua o mesmo: <strong>$valor °$para</strong></p>";

                if ($para === "celsius") {
                    $celsiusConvertido = $valor;
                } elseif ($para === "fahrenheit") {
                    $celsiusConvertido = ($valor - 32) * 5 / 9;
                } elseif ($para === "kelvin") {
                    $celsiusConvertido = $valor - 273.15;
                }
            } else {
                $resultado = 0;
                $tipo = 0;

                if ($de === "fahrenheit") {
                    $valor = ($valor - 32) * 5/9;
                } elseif ($de === "kelvin") {
                    $valor = $valor - 273.15;
                }

                if ($para === "fahrenheit") {
                    $resultado = ($valor * 9/5) + 32;
                    echo "<p>Resultado: <strong>$resultado °F</strong></p>";
                    $tipo = 1;
                } elseif ($para === "kelvin") {
                    $resultado = $valor + 273.15;
                    echo "<p>Resultado: <strong>$resultado K</strong></p>";
                    $tipo = 2;
                } elseif ($para === "celsius") {
                    echo "<p>Resultado: <strong>$valor °C</strong></p>";
                    $tipo = 3;
                    $resultado = $valor;
                }
            }

            switch($tipo) {
                case 1:
                    # fahrenheit
                    $celsiusConvertido = ($resultado - 32) * 5 / 9;
                break;

                case 2: 
                    # kelvin
                    $celsiusConvertido = $resultado - 273.15;
                break;

                case 3:
                    # celcius
                    $celsiusConvertido = $resultado;
            }
        }

        ?> 
    </section>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($celsiusConvertido < -10) {
            echo "<p><strong>Alerta de temperatura extremamente baixa!</strong> Níveis tão baixos representam risco de congelamento de tecidos (como a pele e extremidades), podendo causar hipotermia rapidamente. É essencial se proteger com roupas térmicas e evitar exposição prolongada ao frio.</p>";
        } elseif ($celsiusConvertido < 15) {
            echo "<p><strong>Temperatura baixa detectada.</strong> Embora não seja congelante, esse clima ainda exige agasalhos para manter o conforto térmico. Pessoas mais vulneráveis, como idosos e crianças, devem se proteger bem.</p>";
        } elseif ($celsiusConvertido >= 16 && $celsiusConvertido <= 25) {
            echo "<p><strong>Temperatura ambiente ideal.</strong> Essa faixa é considerada confortável para a maioria das pessoas. Atividades ao ar livre e funcionamento de equipamentos ocorrem normalmente nesse intervalo.</p>";
        } elseif ($celsiusConvertido > 25 && $celsiusConvertido <= 35) {
            echo "<p><strong>Temperatura elevada.</strong> É importante manter-se hidratado e evitar exposição direta ao sol por longos períodos. Climas assim podem causar desconforto e cansaço, principalmente em ambientes fechados.</p>";
        } elseif($celsiusConvertido >= 36 && $celsiusConvertido < 5500) {
            echo "<p><strong>Alerta de calor extremo!</strong> Níveis assim aumentam o risco de desidratação, insolação e superaquecimento de equipamentos eletrônicos. Redobre os cuidados com a saúde e evite esforço físico nas horas mais quentes do dia.</p>";
        } else {
            echo "<p><strong>ALERTA EXTREMO!</strong> Temperatura insana, o sol tá se achando o próprio forno de pizza! Cuidado, a Terra tá quase virando um forno à lenha – se você sentir um calorzinho, é o universo te avisando que tá rolando um churrasco cósmico! 🔥🌞🌪</p>";
        }
    } else {
        echo "<p>A temperatura, seja ela muito alta ou muito baixa, representa um perigo significativo para o corpo humano e para o funcionamento de sistemas e equipamentos. O corpo humano, em particular, possui uma faixa de temperatura ideal (homeostase, em torno de 36,5°C a 37,5°C) na qual todas as suas funções vitais operam de maneira eficiente. Fora dessa faixa, os riscos à saúde se tornam graves.</p>";
    }
    ?>


</main>

<script src="JS/temperatura.js"></script>

<script>
    var celsiusConvertido = <?php echo $celsiusConvertido; ?>;

    if (celsiusConvertido < -10) {
        document.body.style.backgroundImage = "url(imagens/neve.jpg)"; // Frio Extremo
        document.body.style.backgroundSize = "cover"
    } else if (celsiusConvertido < 15) {
        document.body.style.backgroundColor = "#70a1ff"; // Frio
    } else if (celsiusConvertido >= 16 && celsiusConvertido <= 25) {
        document.body.style.backgroundColor = "#dff0d8"; // Confortável
    } else if (celsiusConvertido > 25 && celsiusConvertido <= 35) {
         document.body.style.backgroundColor = "#00bfff";// Quente
    } else if(celsiusConvertido >= 36 && celsiusConvertido < 5500) {
        document.body.style.background = "linear-gradient(to bottom, #ff6347,rgb(212, 57, 0))"; // Calor extremo
    } else {
        document.body.style.background = "linear-gradient(to bottom,rgb(114, 12, 12),rgb(130, 101, 7))";
    }
</script>

</body>
</html>