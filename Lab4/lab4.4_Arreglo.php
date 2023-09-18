

<?php
// Inicializamos el arreglo vacío
$arreglo = [];

// Creamos un bucle para llenar el arreglo con 5 número pares
for ($i = 0; $i < 5; $i++) {
    $numero = null;

    // Solicitamos al usuario que ingrese un número y validamos si es par
    while (true) {
        $numero = intval(readline("Ingrese un número par: "));
        
        if ($numero % 2 == 0) {
            break; // Salimos del bucle si el número es par
        } else {
            echo "El número ingresado no es par. Intente nuevamente.\n";
        }
    }

    // Agregamos el número par al arreglo
    $arreglo[] = $numero;
}

// Mostramos el arreglo resultante
echo "El arreglo de números pares ingresados es: [";
foreach ($arreglo as $indice => $valor) {
    echo $valor;
    if ($indice < count($arreglo) - 1) {
        echo ", ";
    }
}
echo "]\n";
?>
