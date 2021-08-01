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
    <title>Cotización</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" 
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
                            Registro de cotizacion
                        </div>
                        <div class="card-body ">
                            <form action="php/cotizacionr.php" method="POST" enctype="multipart/form-data">
                                <label class="font-weight-bold lead">Tiempo Estimado:<input name="tiempo_estimado" type="text" size="40" maxlength="70"><br><br>
                                <label class="font-weight-bold lead">Capital Humano:<input name="capital_humano" type="text" size="40" maxlength="70"><br><br>
                                <label class="font-weight-bold lead">Costo:<input name="costo" type="text" size="40" maxlength="40" ><br><br>
                                <label class="font-weight-bold lead">Documento Cotización: <input name="file" type="file" ><br><br>
                                <label class="font-weight-bold lead">Pago Acumulado: <input name="pago_acumulado" value = 0 type="text" size="40" maxlength="70" readonly><br><br>
                                <label class="font-weight-bold lead">Seleccione cliente:<select id="cliente" name="cliente"><br><br>
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
                                        <th scope="col">TIEMPO ESTIMADO</th>
                                        <th scope="col">CAPITAL HUMANO</th>
                                        <th scope="col">COSTO</th>
                                        <th scope="col">PAGO ACUMULADO</th>
                                        <th scope="col">DOCUMENTO</th>
                                        <th scope="col">ID OBRA</th>
                                     </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $consultaCotizacion= "SELECT 
                                    cotizacion.idcotizacion,
                                    cotizacion.tiempo_estimado,
                                    cotizacion.capital_humano,
                                    cotizacion.costo,
                                    cotizacion.documento_cotizacion,
                                    cotizacion.pago_acumulado,
                                    obra.nombre_obra
                                    FROM cotizacion
                                    INNER JOIN obra 
                                        ON cotizacion.idobra = obra.idobra";
                                     $result = mysqli_query($conexion,$consultaCotizacion);
                                     while ($mostrar = mysqli_fetch_array($result)){
                                ?>
                                <tr>
                                <td><?php echo $mostrar['idcotizacion'] ?></td>
                                <td><?php echo $mostrar['tiempo_estimado'] ?></td>
                                <td><?php echo $mostrar['capital_humano'] ?></td>
                                <td><?php echo $mostrar['costo'] ?></td>
                                <td><?php echo $mostrar['pago_acumulado'] ?></td>
                                <td><a href="<?php echo '/'.$mostrar['documento_cotizacion'] ?>">Documento</a></td>
                                <td><?php echo $mostrar['nombre_obra'] ?></td>
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
            url: "php/cotizacion.php",
            data: "clientes="+$('#cliente').val(),
            success:function(r){
                $('#seleccioneObra').html(r);
                console.log("hola");
            }
        });
    }
</script>