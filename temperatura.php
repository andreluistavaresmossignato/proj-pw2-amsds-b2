<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>temperatura</title>
    <link rel="stylesheet" href="estilos/temperatura.css">
</head>
<body>
<form action="temperatura.php" method="post">
    <div id="calculo">
        <label for="celcius"></label><br>
        <select name="tipo">
        <option value="1">Celsius para Fahrenheit</option>
        <option value="2">Fahrenheit para Celsius</option>
        <option value="3">Celsius para Kelvin</option>
        </select>
    </div>
    <div id="calculo2">
    <br>
    <label for="resultado" id="resultado"></label>
    <input type="number" id="caixa" name="resultado" placeholder="" required> <br>
    <button type="submit">Calcular</button>
    </div> 

    <br>
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $resultado = $_POST['resultado'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $TSelecionada = $_POST['tipo'];

        if ($TSelecionada == "1") {
            $FAH = ($resultado * 9/5) + 32;
            echo "Resultado em Fahrenheit: $FAH";
        } elseif ($TSelecionada == "2") {
            $CEL = ($resultado - 32) * 5/9;
            echo "Resultado em Celsius: $CEL";
        } elseif ($TSelecionada == "3") {
            $KEL = ($resultado + 273.15);
            echo "Resultado em Kelvin: $KEL";
        } else {
            echo "erro";  
        }
    }
}
?>    
 
</body>
</html>