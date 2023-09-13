<?php
// index.php

// Verificar si se paso un emoji desde emoji.php.
$emoji = isset($_GET['emoji']) ? $_GET['emoji'] : '';

// HTML para mostrar la pagina.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Indicador de Desempeño en Ventas</title>
</head>
<body>
    <h1>Indicador de Desempeño en Ventas</h1>
    <form action="GPT_emoji.php" method="post">
        <label for="ventas">Porcentaje de Ventas:</label>
        <input type="number" name="ventas" id="ventas" required>
        <button type="submit">Mostrar Emoji</button>
    </form>

    <?php
    // Mostrar el emoji dinamico.
    if (!empty($emoji)) {
        echo "<img src='imagenes/$emoji' alt='Emoji'>";
    }
    ?>
</body>
</html>
