<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 4.5</title>
</head>
<body>
    <form method="POST">
        <label for="n">Ingrese un valor par filas y columnas: </label>
        <input type="number" name="n" required>
        <input type="submit" value="Generar Matriz">
    </form>

    <?php
    // Función para verificar si un número es par
    function esPar($numero) {
        return $numero % 2 == 0;
    }

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Obtener el valor de N desde el formulario
        $n = (int)$_POST["n"];

        // Verificar si el número ingresado es par
        if (!esPar($n)) {
            echo "<p>El número ingresado debe ser par.</p>";
        } else {
            // Inicializar la matriz con ceros y unos en la diagonal principal
            $matriz = array();
            for ($i = 0; $i < $n; $i++) {
                for ($j = 0; $j < $n; $j++) {
                    if ($i == $j) {
                        $matriz[$i][$j] = 1; // Diagonal principal con unos
                    } else {
                        $matriz[$i][$j] = 0; // Otros elementos con ceros
                    }
                }
            }

            // Imprimir la matriz
            echo "<h2>Matriz Generada:</h2>";
            echo "<table border='1'>";
            for ($i = 0; $i < $n; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $n; $j++) {
                    echo "<td>" . $matriz[$i][$j] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>
</body>
</html>
