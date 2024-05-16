<?php

    session_start();

    include 'Conexion.php';

    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];

    $val_login = mysqli_query($conexion, "SELECT * FROM clientes WHERE correo ='$correo' and contrasenia ='$contrasenia'");


    //LOGEAR

    if (mysqli_num_rows($val_login) > 0){
        $_SESSION['usuario'] = $correo;
        header("location: PizzaLeo.php");
        exit;

    }else{

        echo '
            <script>
            alert("La contraseña o el correo es incorrecto");
            window.location = "index.php";
            </script>
        
        ';
        exit;
    }






?>