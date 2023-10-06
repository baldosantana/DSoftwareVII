<!DOCTYPE html>
<html>
<head>
    <title>Resultados</title>
</head>
<body>
    <?php
    $numerosPares = array(); // Arreglo para almacenar números pares

    if(isset($_POST['agregar'])){
        $numero = intval($_POST['numero']); // Obtener el número ingresado y convertirlo a un entero

        if ($numero % 2 == 0) { // Verificar si el número es par
            $numerosPares[] = $numero; // Agregar el número par al arreglo
            echo "<p>el nùmero fue ingresado</p>";
        } else {
            echo "<p>Por favor, ingrese un número par.</p>";
        }
        
        exit;
    }

    if (count($numerosPares) == 5) {
        echo "<h2>Números pares ingresados:</h2>";
        echo "<ul>";
        foreach ($numerosPares as $par) {
            echo "<li>$par</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aún debe ingresar " . (5 - count($numerosPares)) . " números pares.</p>";
    }
 
    ?>
</body>
</html>
