<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laboratorio 9.1</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <h1>Consulta de noticias</h1>

    <form action="class/noticias.php" name="formFiltro" method="POST">
        <br>
        <p>Filtrar por: </p>
        <select name="campos" id="">

            <option value="titulo">Titulo</option>
            <option value="texto" selected>Descripcion</option>
            <option value="categoria">Categoria</option>
            
        </select>

        <p>con el valor</p>
        <input type="text" name="valor">
        <input type="submit" name="consultarTodos" value="Ver todos" >
        <input type="submit" name="consultarFiltro" value="Filtrar Datos" >
    </form>


    <?php
        require_once("class/noticias.php");
        $obj_noticia = new Noticia();
        $noticias = $obj_noticia->consultar_noticias();
        if(array_key_exists('consultarTodos',$_POST)){
            $obj_noticias = new noticias();
            $noticias = $obj_noticias->consultar_noticias();
        }
        if(array_key_exists('consultarFiltro',$_POST)){
            $obj_noticias = new noticias();
            $noticias = $obj_noticias->consultar_noticias_filtro($_REQUEST['campos'],$_REQUEST['valor']);
    
        }

        $nfilas = count($noticias);

        if ($nfilas > 0) {
    ?>
            <table>
                <tr>
                    <th>Titulo</th>
                    <th>Texto</th>
                    <th>Categoria</th>
                    <th>Fecha</th>
                    <th>Imagen</th>
                </tr>

                <?php foreach ($noticias as $resultado) { ?>
                    <tr>
                        <td><?= $resultado['titulo'] ?></td>
                        <td><?= $resultado['texto'] ?></td>
                        <td><?= $resultado['categoria'] ?></td>
                        <td><?= date("j/n/Y", strtotime($resultado['fecha'])) ?></td>
                        <td>
                            <?php if ($resultado['imagen'] != "") { ?>
                                <a target="_blank" href="img/<?= $resultado['imagen'] ?>">
                                    <img border="0" src="img/iconotexto.gif">
                                </a>
                            <?php } else { ?>
                                &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        <?php } else { ?>
            <p>No hay noticias disponibles</p>
        <?php } ?>
</body>
</html>
