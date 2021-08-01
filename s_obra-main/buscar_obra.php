<?php
    include 'php/conexion.php';
    session_start();
    if (isset($_SESSION['username'])){
        
    }else{
        $messaget = "❌ NO TIENE ACCESO A LA PÁGINA ❌";
        echo "<script type='text/javascript'>
            alert('$messaget');
            window.location.href = 'index.php';
            </script>";

    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href='css/archivo.css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
        <!--Título de la pagina-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buscar Obra</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sombraN ">
            <div class="container-fluid">
                <h1 class="navbar-brand font-weight-bold lead ">SOUICHI MÉXICO S.A DE C.V.</h1>
            </div>
            <ul class="navbar-nav  ml-auto text-center">
                <button type="submit" class=" btn btn-light font-weight-bolder cerrar"><a href="index.html">Regresar</a></button>
            </ul>
        </nav>
                    <div class="container"></div>
                    <div class="row justify-content-center pt-5 mt-5 mr-4">
                        <div class="col-md-6  col-sm-8 col-xL-4 col-lg-4 formulario">
                            <div class="form-group text-center text-white">
                                <div id=Login>
                                    <h1>Búsqueda de Obras </h1>
                        <form action="php/buscar_o.php" method = "post">
                    <label class="font-weight-bold lead text-white mt-5">Seleccione obra:  <select name="idobra">
                            <option value="0">Seleccione</option>
                            <?php
                                $consultaObra = "SELECT * FROM obra";
                                $result = mysqli_query($conexion,$consultaObra);
                                while ($mostrar = mysqli_fetch_array($result)){
                                    echo '<option value="'.$mostrar[idobra].'">'.$mostrar[nombre_obra].'</option>';
                                }
                            ?>
                        </select><br><br>
                        <button class="btn btn-outline-light font-weight-bold lead" >Buscar</button>
                    </form>
                                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
</body>
</html>