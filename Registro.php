<?php

    include 'Conexion.php';

    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];

    $query = "INSERT INTO clientes(nombre, usuario, telefono, correo, contrasenia) 
              VALUES ('$nombre', '$usuario', '$telefono', '$correo',  '$contrasenia')";


    //validacion para no repetir correos

    $valcorreo = mysqli_query($conexion,"SELECT * FROM clientes WHERE correo = '$correo' ");

    if(mysqli_num_rows($valcorreo) > 0){
        echo ' 
            <script>
                alert("Este correo ya está registrado, intenta con uno diferente");
                window.location = "index.php";
            </script>
        ';
        exit();
    }

    //validacion para no repetir usuarios

    $valusuario = mysqli_query($conexion,"SELECT * FROM clientes WHERE usuario = '$usuario' ");

    if(mysqli_num_rows($valusuario) > 0){
        echo ' 
            <script>
                alert("Este nombre de usuario ya está registrado, intenta con uno diferente");
                window.location = "index.php";
            </script>
        ';
        exit();
    }

    //validacion para no repetir telefonos


    $valtelefono = mysqli_query($conexion, "SELECT * FROM clientes WHERE telefono = '$telefono'");
    if (mysqli_num_rows($valtelefono) > 0) {
        echo '
            <script>
                alert("Este número de teléfono ya está registrado, intenta con uno diferente");
                window.location = "index.php";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    // EJECUTAR EL REGISTRO

    if($ejecutar){
        echo'
            <script>
                alert( "TE HAS REGISTRADO EXITOSAMENTE" );
                window.location = "index.php";
            </script>
        
        
        ';
    }else{
        echo'
            <script>
                alert( "NO SE HA PODIDO REGISTRAR, INTENTE NUEVAMENTE" );
                window.location = "index.php";
            </script>
        ';
    }

    mysqli_close($conexion);

?>