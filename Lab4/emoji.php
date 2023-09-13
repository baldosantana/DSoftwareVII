<?php
// emoji.php

// Obtener el valor de ventas introducido por el usuario (puedes utilizar un formulario POST o GET).
$ventas = $_POST['ventas']; // Cambia esto seg�n c�mo obtengas el valor.

// Determinar qu� emoji mostrar seg�n el valor de ventas.
if ($ventas > 80) {
    $emoji = 'happy.png';
} elseif ($ventas >= 50 && $ventas <= 79) {
    $emoji = 'poker.png';
} else {
    $emoji = 'triste.png';
}

// Redirigir de nuevo a la p�gina principal (index.php) con el emoji correspondiente.
header("Location: GPT_index.php?emoji=$emoji");
exit;
?>
