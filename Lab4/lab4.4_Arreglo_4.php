<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de 5 números</title>
</head>
<body>
    <h1>Solicitud de 5 números</h1>
    <form action="lab4.4_Arreglo_4.php" method="post">
        <input type="text" name="numero" placeholder="Ingrese un número">
        <input type="submit" value="Enviar">
    </form>

    <?php

    // Declaramos un arreglo de 5 elementos
    $numeros = array();

    // Iniciamos el ciclo FOR para solicitar 5 números
    for ($i = 0; $i < 5; $i++) {
        // Obtenemos el valor del número ingresado por el usuario
        $numero = $_POST["numero"];

        // Almacenamos el número en la posición actual del arreglo
        array_push($numeros, $numero);
    }

    // Imprimimos el arreglo en pantalla
    echo "<p>Los números ingresados son:</p>";
    echo "<pre>";
    print_r($numeros);
    echo "</pre>";

    ?>
</body>
</html>
