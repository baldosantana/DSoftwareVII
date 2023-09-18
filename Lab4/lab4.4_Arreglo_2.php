<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Llenar un arreglo de números pares</title>
</head>
<body>
    <h1>Llenar un arreglo de números pares</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
        $array = [];
        $count = 0;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            for ($i = 0; $i < 5; $i++) {
                echo '<label for="numero' . $i . '">Ingrese el número ' . ($i + 1) . ' par:</label>';
                echo '<input type="number" name="numero' . $i . '" id="numero' . $i . '" min="0" max="100" required><br>';

                if (isset($_POST['numero' . $i])) {
                    $numero = (int)$_POST['numero' . $i];

                    if ($numero % 2 == 0) {
                        $array[] = $numero;
                        $count++;
                    } else {
                        echo "El número ingresado no es par. Ingrese un número par.<br>";
                    }
                }
            }

            if ($count === 5) {
                echo "<p>El arreglo de números pares es:</p>";
                echo "<pre>";
                var_dump($array);
                echo "</pre>";
            } else {
                echo "<p>Debe ingresar exactamente 5 números pares.</p>";
            }
        }
        ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
