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
        <title>Registro Obra</title>
</head>
<body>
    <?php   
        date_default_timezone_set('America/Mexico_City');
        $fecha_actual = date ("Y-m-d H:i:s");
    ?>
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
                            Obra
                        </div>
                        <div class="card-body "> 
                             <form method="POST" enctype="multipart/form-data" action="php/obra.php">
                                <label class="font-weight-bold lead">Nombre de la Obra: <input name="nombre_obra" type="text" size="40" maxlength="50" readonly value="<?= $fecha_actual?>"/><br><br>
                                <label class="font-weight-bold lead">Fecha de registro: <input name="fecha" type="date" size="70" maxlength="70"><br><br>
                                <!--Avance de la Obra: <input name="avance" type="number" size="70" maxlength="70" > <br>-->
                                <label class="font-weight-bold lead">Tipo de Obra: <input name="tipo" type="text" size="40" maxlength="50"><br><br>
                                <label class="font-weight-bold lead">Fecha de inicio:   <input name="fecha_inicio" type="date" size="70" maxlength="70"><br><br>
                                <label class="font-weight-bold lead">Fecha de final:    <input name="fecha_fin" type="date" size="70" maxlength="70"><br><br>
                                <label class="font-weight-bold lead">Seleccione cliente:<select name="cliente">
                                <option value="0">Seleccione</option>
                                <?php
                                  $consultaCliente = "SELECT * FROM cliente";
                                  $result = mysqli_query($conexion,$consultaCliente);
                                  while ($mostrar = mysqli_fetch_array($result)){
                                    echo '<option value="'.$mostrar[idcliente].'">'.$mostrar[nombre].'</option>';
                                  }
                                ?>
                                </select><br><br>
                                <label class="font-weight-bold lead">Seleccione responsable: <select name="responsable">
                                <option value="0">Seleccione</option>
                                <?php
                                    $consultaResponsable = "SELECT * FROM responsable";
                                    $result = mysqli_query($conexion,$consultaResponsable);
                                    while ($mostrar = mysqli_fetch_array($result)){
                                        echo '<option value="'.$mostrar[idresponsable].'">'.$mostrar[nombre].'</option>';
                                    }
                                ?>
                                </select><br><br>
                                <h4><u>Ubicacion de la Obra</u></h4><br>
                                <label class="font-weight-bold lead">Calle:<input type="text" name="calle"><br><br>
                                <label class="font-weight-bold lead">Colonia:<input type="text" name="colonia" ><br><br>
                                <label class="font-weight-bold lead">Municipio:<input type="text" name="municipio"><br><br>
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
                                        <th scope="col">ID</td>
                                        <th scope="col">NOMBRE OBRA</td>
                                        <th scope="col">FECHA REGISTRO</td>
                                        <th scope="col">AVANCE</td>
                                        <th scope="col">TIPO</td>
                                        <th scope="col">FECHA INICIO</td>
                                        <th scope="col">FECHA FINAL</td>
                                        <th scope="col">CLIENTE</td>
                                        <th scope="col">RESPONSABLE</td>
                                        <th scope="col">DIRECCION</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $consultaObra = "SELECT 
                                        obra.idobra,
                                        obra.nombre_obra,
                                        obra.fecha_registro,
                                        obra.avance,
                                        obra.tipo_obra,
                                        obra.fecha_inicio,
                                        obra.fecha_fin,
                                        CONCAT_WS (' ',cliente.nombre,cliente.apellidos)as cliente,
                                        CONCAT_WS (' ',responsable.nombre, responsable.apellidos) as responsable,
                                        CONCAT_WS (' ','Calle ',data_entities.calle,', col. ', data_entities.colonia, 
                                        ', ',data_entities.municipio,', ', data_entities.estado) as direccion
                                        FROM obra
                                        INNER JOIN cliente
                                        ON obra.idcliente = cliente.idcliente
                                        INNER JOIN responsable 
                                        ON responsable.idresponsable = obra.idresponsable
                                        INNER JOIN data_entities
                                        ON obra.iddata_entities = data_entities.iddata_entities";
                                        $result = mysqli_query($conexion,$consultaObra);
                                        while ($mostrar = mysqli_fetch_array($result)){
                                    ?>
                                    <tr>  
                                        <td><?php echo $mostrar['idobra'] ?></td>
                                        <td><?php echo $mostrar['nombre_obra'] ?></td>
                                        <td><?php echo $mostrar['fecha_registro'] ?></td>
                                        <td><?php echo $mostrar['avance'] ?></td>
                                        <td><?php echo $mostrar['tipo_obra'] ?></td>
                                        <td><?php echo $mostrar['fecha_inicio'] ?></td>
                                        <td><?php echo $mostrar['fecha_fin'] ?></td>
                                        <td><?php echo $mostrar['cliente'] ?></td>
                                        <td><?php echo $mostrar['responsable'] ?></td>
                                        <td><?php echo $mostrar['direccion'] ?></td>
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