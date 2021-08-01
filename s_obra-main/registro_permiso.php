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
        <title>Permisos</title>
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
                            Registro de permiso
                        </div>
                        <div class="card-body "> 
                            <form action="php/permiso.php" method="POST" enctype="multipart/form-data"> 
                                <label class="font-weight-bold lead">Documento Permiso: <input name="file" type="file"><br><br>
                                <label class="font-weight-bold lead">Seleccione Obra:<select id="obra" name="obra">
                                    <option value="0">Seleccione</option>
                                    <?php
                                        $consultaObra = "SELECT * FROM obra";
                                        $result = mysqli_query($conexion,$consultaObra);
                                        while ($mostrar = mysqli_fetch_array($result)){
                                            echo '<option value="'.$mostrar[idobra].'">'.$mostrar[nombre_obra].'</option>';
                                        }
                                    ?>
                                    </select><br><br>
                                    <label class="font-weight-bold lead">Fecha de inicio del permiso:<input type="date" name="fecha_i"/><br><br>
                                    <label class="font-weight-bold lead">Fecha de vencimiento del permiso:<input type="date" name="fecha_f"/><br><br>    
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
                                        <th scope="col">ID PERMISO</td>
                                        <th scope="col">DOCUMENTO</td>
                                        <th scope="col">OBRA</td>
                                        <th scope="col">FECHA INICIO</td>
                                        <th scope="col">FECHA VENCIMIENTO</td>
                                    </tr>
                                    <?php
                                        $consultaPermiso = "SELECT 
                                        permiso.idpermiso,
                                        permiso.documento_permiso,
                                        obra.nombre_obra,
                                        permiso.fecha_inicio,
                                        permiso.fecha_vencimiento
                                        FROM permiso 
                                        INNER JOIN obra 
                                        ON permiso.idobra = obra.idobra";
                                        $result = mysqli_query($conexion,$consultaPermiso);
                                        while ($mostrar = mysqli_fetch_array($result)){
                                    ?>
                                    <tr>  
                                        <td><?php echo $mostrar['idpermiso'] ?></td>
                                        <td><a href="<?php echo '/'.$mostrar['documento_permiso'] ?>">Permiso</a></td>
                                        <td><?php echo $mostrar['nombre_obra'] ?></td>
                                        <td><?php echo $mostrar['fecha_inicio'] ?></td>
                                        <td><?php echo $mostrar['fecha_vencimiento'] ?></td>
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