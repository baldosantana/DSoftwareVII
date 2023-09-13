<?php
// Llenar el arreglo con 20 elementos aleatorios entre 1 y 50.
$arreglo = [];
for ($i = 0; $i < 20; $i++) {
    $arreglo[] = rand(1, 50);
}

// Inicializar variables para el elemento mayor.
$elementoMayor = $arreglo[0]; 
$posicionMayor = 0;

// Recorrer el arreglo para encontrar el elemento mayor.
for ($i = 1; $i < count($arreglo); $i++) {
    if ($arreglo[$i] > $elementoMayor) {
        $elementoMayor = $arreglo[$i];
        $posicionMayor = $i+1;
    }
}

// Mostrar en pantalla el arreglo y la posición y valor del elemento mayor.
echo "Arreglo: [";
foreach ($arreglo as $indice => $valor) {
    echo $valor;
    if ($indice < count($arreglo) - 1) {
        echo ", ";
    }
}
echo "]<br>";

echo "El elemento mayor está en la posición $posicionMayor y su valor es $elementoMayor.";
?>
