    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Parcial 2</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>

    <?php




function suma_serie($n) {
    $suma = 0;
    for ($i = 1; $i <= $n; $i++) {
        if ($i == 1) {
            $suma += $n;
        } else {
            $suma += ($n - ($i-1)) / obtieneFactorial($i);
        }
    }

   return $suma;
   
}

   

    function obtieneFactorial($numero){ 
        $factorial = 1; 
        $sumatoria = 1; 
        $i=1;
        for ($i = 1; $i <= $numero; $i++){ 
        $factorial = $factorial * $i; 
        } 
        return $factorial; 
    } 
        $resultado = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numero = isset($_POST['numero']) ? $_POST['numero'] : '';

            if (is_numeric($numero)) {
                // Calcula Factorial
                $resultado = (obtieneFactorial($numero));

                //Calcula Sumatoria
                $resultado2 =  (($numero+1)-$numero)/$resultado;
                
            } else {
                // Mostrar un mensaje de error si no se ingresó un número
                $resultado = 'Error: Por favor, ingrese un número válido.';
            }
        }
    ?>



        <form action="Listar.php" method="post">


        <p>Ingrese un Número para realizar la sumatoria</p>

    <!-- Agregamos la codificación para imprimir el resultado en pantalla -->
    <form action="" method="POST"> 
        <label for="numero">Número:</label>
        <input type="text" name="numero" id="numero" required>
        
        <input type="submit" name="enviar" value="enviar">
    </form>
        
        <h1>Historial de Registros</h1>
        </form>

        

        <?php
            if (isset($_POST['enviar'])) {
                require_once("class/noticias.php");
                $obj_noticia = new Noticia();

               
               // Obtener valores de $_POST 
    $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
    $factorial = (obtieneFactorial($numero)); 
    $sumatoria = suma_serie($numero);

    // Llamado a la función para insertar valores antes de consultar
    $obj_noticia->llamar_sp_insertar($numero, $factorial, $sumatoria);
    //echo "Para n = 3, la suma de la serie es: " . suma_serie(3);
    // Consultar valores después de la inserción
    $noticias = $obj_noticia->consultar_noticias();
                $nfilas = count($noticias);

                if ($nfilas > 0) {
        ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>numero</th>
                            <th>factorial</th>
                            <th>sumatoria</th>
                        </tr>

                        <?php foreach ($noticias as $resultado) { ?>
                            <tr>
                                <td><?= $resultado['ID'] ?></td>
                                <td><?= $resultado['n'] ?></td>
                                <td><?= $resultado['factorial'] ?></td>
                                <td><?= $resultado['sumatoria'] ?></td>
                            </tr>
                        <?php } ?>

                    </table>
                <?php } else { ?>
                    <p>No hay registros disponibles</p>
                    
                <?php }
            }
        ?>
    </body>
    </html>
