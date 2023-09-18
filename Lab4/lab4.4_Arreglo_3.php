<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Llenar un arreglo de números pares</title>
</head>
<body>
    <h1>Llenar un arreglo de números pares</h1>

    <?php
    // Declaramos un arreglo de 5 elementos
    $numeros = array();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Bucle para leer los datos del usuario
        for ($i = 0; $i < 5; $i++) {
            // Solicitamos al usuario que ingrese un número
            $numero = (int)$_POST["numero$i"];

            // Si el número es impar, solicitamos al usuario que ingrese un valor correcto
            while ($numero % 2 != 0) {
                echo "El número ingresado en el campo $i es impar. Ingrese un número par: ";
                $numero = (int)$_POST["numero$i"];
            }

            // Agregamos el número al arreglo
            $numeros[] = $numero;
        }

        // Imprimimos el arreglo
        echo "<p>Los números pares ingresados son: " . implode(", ", $numeros) . "</p>";
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php for ($i = 0; $i < 5; $i++): ?>
            <label for="numero<?php echo $i; ?>">Ingrese un número par:</label>
            <input type="number" name="numero<?php echo $i; ?>" id="numero<?php echo $i; ?>" min="0" max="100" required><br>
        <?php endfor; ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
