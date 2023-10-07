<?php
include("lab63_class_lib.php"); 

$soporte1 = new Soporte("The Soccer Game", 22, 3);
echo "<b>" . $soporte1->titulo . "</b>";
echo "<br>Precio: " . $soporte1->dame_precio_sin_itbm() . " dolares";
echo "<br>Precio ITBM incluido: " . $soporte1->dame_precio_con_itbm() . " dolares";

// Ejemplo de uso de la clase hija Video
$mivideo = new Video("Los Otros", 22, 4.5, "115 minutos");
echo "<br><br>";
echo "<b>" . $mivideo->titulo . "</b>";
echo "<br>Precio: " . $mivideo->dame_precio_sin_itbm() . " dolares";
echo "<br>Precio ITBM incluido: " . $mivideo->dame_precio_con_itbm() . " dolares ";
echo "<br>" . $mivideo->imprime_caracteristicas();

// Ejemplo de uso de la clase hija Juego
$mijuego = new Juego("Pes 18", 21, 2.5, "Xbox 360", 1, 2);
echo "<br><br>";
echo "<b>" . $mijuego->titulo . "</b>";
echo "<br>Precio: " . $mijuego->dame_precio_sin_itbm() . " dolares";
echo "<br>Precio ITBM incluido: " . $mijuego->dame_precio_con_itbm() . " dolares ";
echo "<br>" . $mijuego->imprime_caracteristicas();
echo "<br>";
$mijuego->imprime_jugadores_posibles();

$mijuego2 = new Juego("Fifa 18", 27, 3, "PS 4", 1, 2);
echo "<br><br>";
echo "<b>" . $mijuego2->titulo . "</b>";
echo "<br>" . $mijuego2->imprime_caracteristicas();
$mijuego2->imprime_jugadores_posibles();
?>
