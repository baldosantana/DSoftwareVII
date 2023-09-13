<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del Factorial</title>
</head>
<body>
    <h1>Resultado del Factorial</h1>

    <?php
    // Funcion para calcular el factorial de un numero.
    function calcularFactorial($numero) {
        if ($numero == 0 || $numero == 1) {
            return 1; // El factorial de 0 y 1 es 1.
        } else {
            return $numero * calcularFactorial($numero - 1);
        }
    }

    // Obtener el numero ingresado por el usuario.
    $numero = isset($_POST['numero']) ? $_POST['numero'] : 0;

    // Calcular el factorial.
    $factorial = calcularFactorial($numero);

    // Mostrar el resultado.
    echo "<p>El factorial de $numero es: $factorial</p>";
    ?>
</body>
</html>
