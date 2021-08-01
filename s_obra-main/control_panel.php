<?php
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
    <title>Constructora - Soiuchi</title>
</head>
<body>
<header id="header">
        <nav class="navbar navbar-expand-lg navbar-dark sombraN ">
            <div class="form-group logo-img">
            <img src="imagenes/logo.png">
            </div>
            <div class="container-fluid">
                <h1 class="navbar-brand font-weight-bold lead ">SOUICHI MÉXICO S.A DE C.V.</h1>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row mt-4">
                <div id="uno" class="col-lg-3 container-fluid">
                    <div class="card border-dark">
                        <div class=" bg-dark font-weight-bold lead text-white card-header">
                            Registros
                        </div>
                        <div class="card-body ">
                            <button class="btn btn-outline-light font-weight-bold lead " ><a href="registro_cliente.php">Registrar Cliente</a></button><br><br>
                            <button class="btn btn-outline-light font-weight-bold lead " ><a href="registro_responsable.php">Registrar Responsable</a></button><br><br>
                            <button class="btn btn-outline-light font-weight-bold lead " ><a href="registro_proveedor.php">Registrar Proveedor</a></button><br><br>
                            <button class="btn btn-outline-light font-weight-bold lead " ><a href="registro_material.php">Registrar Material</a></button><br><br>
                            <button class="btn btn-outline-light font-weight-bold lead " ><a href="registro_obra.php">Registrar Obra</a></button><br><br>
                            <button class="btn btn-outline-light font-weight-bold lead " ><a href="registro_plano.php">Registrar Plano</a></button><br><br>
                            <button class="btn btn-outline-light font-weight-bold lead " ><a href="registro_cotizacion.php">Registrar Cotización</a></button><br><br>
                            <button class="btn btn-outline-light font-weight-bold lead " ><a href="registro_contrato.php">Registrar Contrato</a></button><br><br>
                            <button class="btn btn-outline-light font-weight-bold lead " ><a href="registro_pago.php">Registrar Pago</a></button><br><br>
                            <button class="btn btn-outline-light font-weight-bold lead " ><a href="registro_entregas.php">Registrar Entregas</a></button><br><br>
                        </div>
                    </div>
                </div>
                <div id="dos" class="col-lg-9  container-fluid">
                    <div class="card border-dark">
                        <div class=" bg-dark font-weight-bold lead text-white card-header">
                            Tablero de control
                        </div>
                        <div class="card-body ">
                            <div class="form-group dash-img ">
                            <img src="imagenes/Dashboard Souichi.png" class="img-fluid">>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
</body>
</html>