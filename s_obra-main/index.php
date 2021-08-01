<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href='/css/index.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
    <!--Título de la pagina-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
</head>
<body>
<div class="container"></div>
    <div class="row justify-content-center pt-5 mt-5 mr-4">
        <div class="col-md-6  col-sm-8 col-xL-4 col-lg-4 formulario">
            <div class="form-group text-center text-white">
                <div id=Login>
                    <h1>Login Administrador </h1>
                    <form action="php/login.php" method="post">
                    <label class="font-weight-bold lead mt-5">Usuario: <input type="text" id="correo" name="correo"><br><br>
                    <label class="font-weight-bold lead">Password: <input type="password" id="password" name="password"><br><br>
                    <input type="submit" value="Sign in">
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
</body>
</html>