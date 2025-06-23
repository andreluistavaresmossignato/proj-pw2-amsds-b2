<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Conversor de Temperatura</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
  <link rel="stylesheet" href="estilos/temperatura.css">
</head>
<body id="bodyBg">

  <div class="container">
    <h1><span class="ri-temp-cold-line icon"></span> Conversor de Temperatura</h1>
    <form method="post">
      <label for="valor">Digite a temperatura</label>
      <input type="number" name="valor" id="valor" required placeholder="ex: 30">
      <div style="display: flex; gap: 10px;">
        <div style="flex: 1;">
          <span><label for="de">De</label></span>
          <select name="de" id="de">
            <option value="celsius">Celsius (°C)</option>
            <option value="fahrenheit">Fahrenheit (°F)</option>
            <option value="kelvin">Kelvin (K)</option>
          </select>
        </div>
        <div style="flex: 1;">
          <span><label for="para">Para</label></span>
          <select name="para" id="para">
            <option value="celsius">Celsius (°C)</option>
            <option value="fahrenheit">Fahrenheit (°F)</option>
            <option value="kelvin">Kelvin (K)</option>
          </select>
        </div>
      </div>

      <button type="submit"><i class="ri-exchange-line"></i> Converter</button>
    </form>

    <a href="../index.html"><button id="voltar">Voltar para Tela Principal</button></a>

    <?php
    $celsiusConvertido = null;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $valor = $_POST["valor"];
        $de = $_POST["de"];
        $para = $_POST["para"];
        $resultado = $valor;

        if ($de !== $para) {
            if ($de === "fahrenheit") $valor = ($valor - 32) * 5 / 9;
            if ($de === "kelvin") $valor = $valor - 273.15;

            if ($para === "celsius") $resultado = $valor;
            if ($para === "fahrenheit") $resultado = ($valor * 9 / 5) + 32;
            if ($para === "kelvin") $resultado = $valor + 273.15;
        }

        if ($para === "celsius") $celsiusConvertido = $resultado;
        elseif ($para === "fahrenheit") $celsiusConvertido = ($resultado - 32) * 5 / 9;
        elseif ($para === "kelvin") $celsiusConvertido = $resultado - 273.15;

        echo "<div class='resultado'>";

        if($para === "kelvin") echo "<strong>Resultado</strong><div class='temperatura'>" . number_format($resultado, 2) . " " . strtoupper(substr($para, 0, 1)) . "</div>";
        else echo "<strong>Resultado</strong><div class='temperatura'>" . number_format($resultado, 2) . " °" . strtoupper(substr($para, 0, 1)) . "</div>";
        
        
        if ($celsiusConvertido < -10) {
            echo "<div class='aviso'>❄️Alerta de temperatura extremamente baixa! Níveis tão baixos representam risco de congelamento. Use roupas térmicas e evite exposição prolongada.</div>";
            echo "<script>document.body.classList.add('bg-neve');</script>";
        } elseif ($celsiusConvertido < 15) {
            echo "<div class='aviso'><p><strong>🧥Temperatura baixa detectada.</strong> Embora não seja congelante, esse clima ainda exige agasalhos para manter o conforto térmico. Pessoas mais vulneráveis, como idosos e crianças, devem se proteger bem.</p></div>";
        } elseif ($celsiusConvertido <= 25) {
            echo "<div class='aviso'><p><strong>🌤Temperatura ambiente ideal.</strong> Essa faixa é considerada confortável para a maioria das pessoas. Atividades ao ar livre e funcionamento de equipamentos ocorrem normalmente nesse intervalo.</p></div>";
        } elseif ($celsiusConvertido <= 35) {
            echo "<div class='aviso'><p><strong>🌞Temperatura elevada.</strong> É importante manter-se hidratado e evitar exposição direta ao sol por longos períodos. Climas assim podem causar desconforto e cansaço, principalmente em ambientes fechados.</p></div>";
        } elseif ($celsiusConvertido < 5500) {
            echo "<div class='aviso'><p><strong>🔥Alerta de calor extremo!</strong> Níveis assim aumentam o risco de desidratação, insolação e superaquecimento de equipamentos eletrônicos. Redobre os cuidados com a saúde e evite esforço físico nas horas mais quentes do dia.</p></div>";
        } else {
            echo "<div class='aviso'><p><strong>ALERTA EXTREMO!</strong> Temperatura insana, o sol tá se achando o próprio forno de pizza! Cuidado, a Terra tá quase virando um forno à lenha – se você sentir um calorzinho, é o universo te avisando que tá rolando um churrasco cósmico! 🔥🌞</div>";
        }

        echo "</div>";
    }
    ?>
  </div>

  </div>

  <script>
    const temp = <?php echo json_encode($celsiusConvertido); ?>;
    const body = document.getElementById("bodyBg");

    if (temp !== null) {
      if (temp < -10) body.classList.add("bg-neve");
      else if (temp < 15) body.classList.add("bg-frio");
      else if (temp <= 25) body.classList.add("bg-confortavel");
      else if (temp <= 35){
        body.classList.add("bg-quente");
        document.querySelector('h1').style.color = "black";
        document.querySelectorAll('label').forEach(el => el.style.color = "black");
        document.querySelectorAll('span').forEach(el => el.style.color = "black");
      } 
      else if (temp < 5500) body.classList.add("bg-extremo");
      else body.classList.add("bg-insano");
    }
  </script>

</body>
</html>
