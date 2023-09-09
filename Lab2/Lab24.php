<html>
<head>
    <title>Laboratorio 2.4</title>
</head>
<body>
    <?php
    //Creacion del arreglo array ("clave" => "valor")
    $personas = array ("Juan" => "Panama", 
    "Jhon" => "USA",
    "Eica" => "Finlandia",
    "Kusanagi" => "Japon");

    //Recorrer todo el arreglo
    foreach($personas as $persona => $pais){
        print "$persona es de $pais <br>";
    }

//Impresion especifica
   echo "<br>".$personas ["Juan"];
   echo "<br>".$personas ["Eica"];?>
</body>
</html>