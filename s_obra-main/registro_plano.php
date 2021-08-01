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
    <title>Plano</title>
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
                            Registro de planos
                        </div>
                        <div class="card-body "> 
                            <form action="php/plano.php" method="POST" enctype="multipart/form-data">
                                <label class="font-weight-bold lead">Descripcion: <input name="descripcion" type="text" size="50" maxlength="255"> <br><br>
                                <label class="font-weight-bold lead">Seleccione plano:<input name="file" type="file" ><br><br>
                                <label class="font-weight-bold lead">Seleccione obra:<select name="idobra">
                                    <option value="0">Seleccione</option>
                                <?php
                                    $consultaObra = "SELECT * FROM obra";
                                    $result = mysqli_query($conexion,$consultaObra);
                                    while ($mostrar = mysqli_fetch_array($result)){
                                        echo '<option value="'.$mostrar[idobra].'">'.$mostrar[nombre_obra].'</option>';
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
                                        <td>ID PLANO</td>
                                        <td>ID OBRA</td>
                                        <td>DESCRIPCION</td>
                                        <td>DOCUMENTO</td>
                                    </tr>
                                    <?php
                                        $consultaPlano = "SELECT * FROM plano";
                                        $result = mysqli_query($conexion,$consultaPlano);
                                        while ($mostrar = mysqli_fetch_array($result)){
                                    ?>
                                    <tr>
                                        <td><?php echo $mostrar['idplano'] ?></td>
                                        <td><?php echo $mostrar['idobra'] ?></td>
                                        <td><?php echo $mostrar['descripcion'] ?></td>
                                        <td><a href="<?php echo 'control_obra/'.$mostrar['documento_plano'] ?>">Documento</a></td>
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
