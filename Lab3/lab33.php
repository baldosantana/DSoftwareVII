<!DOCTYPE html>
<html>
<head>
    <title>Laboratorio 3.3</title>
</head>
<body>
<?php
if (isset($_POST['enviar'])) {
    if ($_POST['Apellido'] != "") {
        echo "El apellido ingresado es: " . $_POST['Apellido'];
    } else {
        echo "Favor de colocar el apellido.";
    }

    echo "<br>";

    if ($_POST['Nombre'] != "") {
        echo "El nombre ingresado es: " . $_POST['Nombre'];
    } else {
        echo "Favor de colocar el nombre.";
    }
} else {
?>
    <form action="lab33.php" method="POST">
        Nombre: <input type="text" name="Nombre"><br>
        Apellido: <input type="text" name="Apellido"><br>
        <input type="submit" name="enviar" value="Enviar datos">
    </form>
<?php
}
?>
</body>
</html>
