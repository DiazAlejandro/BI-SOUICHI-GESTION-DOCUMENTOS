<?php
    include 'conexion.php';
    $directorio = "../archivos/planos/";
    $nombreDoc = trim($_FILES["file"]["name"]);
    $nombreDoc = str_replace(" ","_",$nombreDoc);
    $archivo = $directorio.basename($nombreDoc);    
    //Extención del archivo
    $tipoArchivo  = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    $archivo_size = $_FILES["file"]["size"];

    if ($archivo_size > 5120000){
        echo "El archivo tiene que ser menor a 5MB";
    }else{
        if ($tipoArchivo == "pdf"){
            if(move_uploaded_file($_FILES["file"]["tmp_name"],$archivo)){
                $query = "INSERT INTO plano (descripcion, idobra, documento_plano)
                          VALUES ('".$_POST["descripcion"]."',
                                  '".$_POST["idobra"]."',
                                  '$archivo')";
                                  $resultado = mysqli_query($conexion,$query);
                                  if ($resultado == 1){
                                      $messaget = "REGISTRO AGREGADO CORRECTAMENTE";
                                          echo "<script type='text/javascript'>
                                                  alert('$messaget');
                                                  window.location.href = '../registro_material.php';
                                              </script>";
                                              mysqli_close($conexion);
                                  }else{
                                      $messagec = "NO SE AGREGÓ EL PROVEEDOR";
                                      echo "<script type='text/javascript'>
                                              alert('$messagec');
                                              window.location.href = '../registro_proveedor.php';
                                          </script>";
                                          mysqli_close($conexion);
                                  }
            }else{
                $messagec = "ERROR AL SUBIR EL ARCHIVO";
                echo "<script type='text/javascript'>
                    alert('$messagec');
                    window.location.href = '../registro_pago.php';
                </script>";
                mysqli_close($conexion);
            }
        }else{
            $messagec = "ERROR AL SUBIR EL ARCHIVO";
                echo "<script type='text/javascript'>
                    alert('$messagec');
                    window.location.href = '../registro_pago.php';
                </script>";
                mysqli_close($conexion);
        }
    }
?>