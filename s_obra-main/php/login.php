<?php
    session_start();
    $username = $_POST['correo'];
    $password = $_POST['password'];

    $user = "admin";
    $pass = "1234";

    if($user == $username && $pass == $password){
        $_SESSION['username'] = $user;
        header("location: ../index.html");

    }else{
        $messaget = "CREDENCIALES INCORRECTAS";
        echo "<script type='text/javascript'>
                alert('$messaget');
                window.location.href = '../index.php';
            </script>";

    }
    
?>
