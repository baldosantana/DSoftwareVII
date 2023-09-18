<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numeros = [];

    for ($i = 1; $i <= 5; $i++) {
        if (isset($_POST["numero$i"])) {
            $numero = $_POST["numero$i"];
            $numeros[] = $numero;
        }
    }

    if (count($numeros) === 5) {
        echo "Los números ingresados son: " . implode(", ", $numeros);
    } else {
        echo "Por favor, ingrese 5 números.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingreso de números</title>
</head>
<body>
    <h1>Ingreso de números</h1>
    <form action="" method="post">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <label for="numero<?= $i ?>">Ingrese el número <?= $i ?>:</label>
            <input type="number" name="numero<?= $i ?>" required>
            <br>
        <?php endfor; ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
