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
        <title>Pago</title>
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
                            Registro de pago
                        </div>
                        <div class="card-body "> 
                            <form action="php/pago.php" method="POST" enctype="multipart/form-data">
                                <label class="font-weight-bold lead">Concepto:<input name="concepto" type="text" size="40" maxlength="70"><br><br>
                                <label class="font-weight-bold lead">Monto <input name="monto" type="number" size="70" maxlength="70"><br><br>
                                <label class="font-weight-bold lead">Fecha  <input name="fecha" type="datetime" size="30" maxlength="70" readonly value="<?= $fecha_actual?>"><br><br>
                                <label class="font-weight-bold lead">Documento de pago:<input name="file" type="file" ><br><br>
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
                                <label class="font-weight-bold lead">Seleccione cotizacion: <select name="cotizacion">
                                    <option value="0">Seleccione</option>
                                    <?php
                                        $consultaCotizacion = "SELECT * FROM cotizacion";
                                        $result = mysqli_query($conexion,$consultaCotizacion);
                                        while ($mostrar = mysqli_fetch_array($result)){
                                            echo '<option value="'.$mostrar[idcotizacion].'">'.$mostrar[idcotizacion].'</option>';
                                        }
                                    ?>
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
                                        <th scope="col">ID</th>
                                        <th scope="col">CONCEPTO</th>
                                        <th scope="col">FECHA</th>
                                        <th scope="col">ID CLIENTE</th>
                                        <th scope="col">ID COTIZACION</th>
                                        <th scope="col">DOCUMENTO</th>
                                    </tr>
                                    <?php
                                        $consultaPago = "SELECT * FROM pago";
                                        $result = mysqli_query($conexion,$consultaPago);
                                        while ($mostrar = mysqli_fetch_array($result)){
                                    ?>
                                    <tr>
                                        <td><?php echo $mostrar['concepto'] ?></td>
                                        <td><?php echo $mostrar['monto'] ?></td>
                                        <td><?php echo $mostrar['fecha'] ?></td>
                                        <td><?php echo $mostrar['idcliente']?></td>
                                        <td><?php echo $mostrar['idcotizacion']?></td>
                                        <td><a href="<?php echo '/'.$mostrar['documento_pago'] ?>">Documento de pago</a></td>
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