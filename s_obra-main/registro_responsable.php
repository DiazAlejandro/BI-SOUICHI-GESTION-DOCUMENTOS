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
<html lang="en">
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
    <title>Responsable</title>
</head>
<body>
<!--FORMULARIO-->
<header id="header">
        <nav class="navbar navbar-expand-lg navbar-dark sombraN ">
            <div class="container-fluid">
                <h1 class="navbar-brand font-weight-bold lead ">SOUICHI MÉXICO S.A DE C.V.</h1>
            </div>
            <ul class="navbar-nav  ml-auto text-center">
                <button type="submit" class=" btn btn-light font-weight-bolder cerrar"><a href="index.html">Regresar</a></button>
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row mt-4">
                <div id="uno" class="col-lg-5 container-fluid">
                    <div class="card border-dark">
                        <div class=" bg-dark font-weight-bold lead text-white card-header">
                            Registro de responsable
                        </div>
                        <div class="card-body ">
                            <form action="php/responsable.php" method="POST" enctype="multipart/form-data">
                                <label class="font-weight-bold lead">Nombre(s):<input type="text" name="nombre" ><br><br>
                                <label class="font-weight-bold lead">Apellidos:<input type="text" name="apellidos"><br><br>
                                <label class="font-weight-bold lead">Telefono:<input type="text" name="telefono" ><br><br>
                                <label class="font-weight-bold lead">Correo:<input type="text" name="correo" ><br><br>
                                <h4><u>Dirección</u></h4><br>
                                <label class="font-weight-bold lead">Calle:<input type="text" name="calle" ><br><br>
                                <label class="font-weight-bold lead">Colonia:<input type="text" name="colonia" ><br><br>
                                <label class="font-weight-bold lead">Municipio:<input type="text" name="municipio" ><br><br>
                                <label class="font-weight-bold lead">Estado:<input type="text" name="estado" ><br><br>
                                <label class="font-weight-bold lead">Estatus: <select name="statusd">
                                    <option value="V">Verificado</option>
                                    <option value="F">No Validado</option>
                                    </select><br><br>
                                <button class="btn btn-outline-success font-weight-bold lead" >Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="dos" class="col-lg-7  container-fluid">
                    <div class="card border-dark">
                        <div class=" bg-dark font-weight-bold lead text-white card-header">
                            Tabla de registros
                        </div>
                        <div class="card-body ">
                            <table class="table table-responsive table-dark table-hover table-bordered border-light">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>NOMBRE</td>
                                        <td>APELLIDOS</td>
                                        <td>CORREO ELECTRÓNICO</td>
                                        <td>TELÉFONO</td>
                                        <td>DIRECCIÓN</td>
                                    </tr>
                                    <?php
                                        $consultaResponsable= "SELECT 
                                        responsable.idresponsable,
                                        responsable.nombre,
                                        responsable.apellidos,
                                        responsable.correo_e,
                                        responsable.telefono,
                                        CONCAT_WS (' ','Calle ',data_entities.calle,',col. ', data_entities.colonia,
                                        ',',data_entities.municipio,',', data_entities.estado) as direccion
                                        FROM responsable
                                        INNER JOIN data_entities 
                                        on responsable.iddata_entities = data_entities.iddata_entities";
                                        $result = mysqli_query($conexion,$consultaResponsable);
                                        while ($mostrar = mysqli_fetch_array($result)){
                                    ?>
                                    <tr>
                                        <td><?php echo $mostrar['idresponsable'] ?></td>
                                        <td><?php echo $mostrar['nombre'] ?></td>
                                        <td><?php echo $mostrar['apellidos'] ?></td>
                                        <td><?php echo $mostrar['correo_e']?></td>
                                        <td><?php echo $mostrar['telefono']?></td>
                                        <td><?php echo $mostrar['direccion']?></td>
                                        <?php
                                            }
                                        ?>
                                    </tr>
                                </tbody>
                             </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    </body>
</html>
