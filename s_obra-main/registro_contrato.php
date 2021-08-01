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
        <title>Contrato</title>
        <script src="https://code.jquery.com/jquery-3.6.0.js" 
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
                            Registro de contratos
                        </div>
                        <div class="card-body ">
                            <form action="php/contrator.php" method="POST" enctype="multipart/form-data">
                                <label class="font-weight-bold lead">Fecha_Registro:<input type="datetime" name="fecha" readonly value="<?= $fecha_actual?>"><br><br>
                                <label class="font-weight-bold lead">Costo: <input name="precio" type="text" size="45" maxlength="45"><br><br>
                                <label class="font-weight-bold lead">Descripción: <input name="descripcion" type="text" size="45" maxlength="45"><br><br>
                                <label class="font-weight-bold lead">Derechos: <input name="derechos" type="text" size="45" maxlength="45"><br><br>
                                <label class="font-weight-bold lead">Obligación: <input name="obligaciones" type="text" size="45" maxlength="45"><br><br>
                                <label class="font-weight-bold lead">Seleccione Contrato:<input name="file" type="file" ><br><br>
                                <label class="font-weight-bold lead">Seleccione cliente:<select id="cliente" name="cliente">
                                    <option value="0">Seleccione</option>
                                <?php
                                  $consultaCliente = "SELECT idcliente, CONCAT_WS(' ', nombre, apellidos) AS nombre FROM CLIENTE";
                                  $result = mysqli_query($conexion,$consultaCliente);
                                  while ($mostrar = mysqli_fetch_array($result)){
                                     echo '<option value="'.$mostrar[idcliente].'">'.$mostrar[nombre].'</option>';
                                  }
                                ?>
                                </select><br><br>
                                <!--Div para mostrar los clientes de acuerdo a la obra-->
                                <div id= "seleccioneObra"></div>
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
                                        <th scope="col">FECHA</th>
                                        <th scope="col">DESCRIPCION</th>
                                        <th scope="col">DERECHOS</th>
                                        <th scope="col">OBLIGACIONES</th>
                                        <th scope="col">DOCUMENTO</th>
                                        <th scope="col">CLIENTE</th>
                                        <th scope="col">OBRA</th>
                                        <th scope="col">COTIZACION</th>
                                        </tr>
                                </thead>
                                <tbody>
                                <?php
            $consultaContrato = "SELECT 
                                contrato.idcontrato,
                                contrato.fecha,
                                contrato.descripcion,
                                contrato.derechos,
                                contrato.obligaciones,
                                contrato.documento_contrato,
                                CONCAT_WS(' ', cliente.nombre, cliente.apellidos) AS nombre_cliente,
                                obra.nombre_obra,
                                cotizacion.documento_cotizacion
                            FROM contrato 
                                INNER JOIN cliente 
                                    ON contrato.idcliente = cliente.idcliente
                                INNER JOIN obra 
                                    ON contrato.idobra = obra.idobra
                                INNER JOIN cotizacion
                                    ON cotizacion.idcotizacion = contrato.idcotizacion";
            $result = mysqli_query($conexion,$consultaContrato);
            while ($mostrar = mysqli_fetch_array($result)){
            ?>
            <tr>  
                <td><?php echo $mostrar['idcontrato'] ?></td>
                <td><?php echo $mostrar['fecha'] ?></td>
                <td><?php echo $mostrar['descripcion'] ?></td>
                <td><?php echo $mostrar['derechos'] ?></td>
                <td><?php echo $mostrar['obligaciones'] ?></td>
                <td><a href="<?php echo '/'.$mostrar['documento_contrato'] ?>">Documento</a></td>
                <td><?php echo $mostrar['nombre_cliente'] ?></td>
                <td><?php echo $mostrar['nombre_obra'] ?></td>
                <td><a href="<?php echo '/'.$mostrar['documento_contizacion'] ?>">Documento</a></td>

            </tr>
        <?php
            }
        ?>
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

<script type = "text/javascript">
    $(document).ready(function(){
        recargarLista();
        $('#cliente').change(function(){
            recargarLista();
        });
    });
</script>

<script type = "text/javascript">
    function recargarLista(){
        $.ajax({
            type: "POST",
            url: "php/contrato.php",
            data: "clientes="+$('#cliente').val(),
            success:function(r){
                $('#seleccioneObra').html(r);
            }
        });
    }
</script>