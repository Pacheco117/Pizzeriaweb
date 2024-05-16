<?php
   session_start();

    if(!isset($_SESSION['usuario'])){
        echo'
            <script>
                alert("Por favor debes iniciar sesión");
                window.location = index.php";
            </script>
        ';
        session_destroy();
        die();
    }
    
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> PIZZERIA LEO </title>
		<link rel="stylesheet", href="css/index.css">
        <!-- Bootstrap CSS -->
   
	</head>

    <!--CUERPO DEL CODIGO-->

    <body>
    <?php include 'conexion.php';?>
        <!--ENCABEZADO RESPONSIVE-->

        <header class="header"> 
            <div class="menu container">

                <!--VINCULOS-->

                <a href="#" class="logo">PIZZA LEO</a>

                <input type="checkbox" id="menu" />

                <label for="menu">
                    <img src="iconos/Menu_icon.png" class="menu-icono" alt="">
                </label>

                <nav class="navbar">
                    <ul>
                        <li><a href="#lista-1" class="nav-link">MENU</a></li>
                        <li><a href="#ubicacion" class="nav-link">UBICACIÓN</a></li>
                        <li><a href="#contactanos" class="nav-link">CONTACTANOS</a></li>
                        <li><a href="Cerrar_sesion.php"> SALIR </a></li>
                    </ul>
                </nav>

                <!--CARRITO DE COMPRA-->

                <div>
                    <ul>
                        <li class="submenu">
                            <img src="iconos/Canasta_icon.png" id="img-carrito" alt="">
                            <div id="carrito">
                                <table id="lista-carrito">
                                    <thead>
                                        <tr>
                                            <th>Pizza</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <a href="#" id="vaciar-carrito" class="btn-2">LIMPIAR</a>
                                <a href="#" id="comprar-carrito" class="btn-2" onclick="agregarCompra()">COMPRAR</a>
                                <!-- <a href="#" id="comprar-carrito" class="btn-2">COMPRAR</a> -->
                                <a href="#" id="ver-pedido" class="btn-2">VER PEDIDO</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!--¿QUIENES SOMOS?-->

            <div class="header-content container">
                <div class="header-txt">
                    <span>¿QUIENES SOMOS?</span>
                    <h1>HISTORIA</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Quia earum dignissimos facilis? Architecto dignissimos provident
                        sequi porro repellendus unde aliquam recusandae molestiae voluptatum ab.
                        Ad quae ex corrupti officiis consequatur
                    </p>
                </div>
                <div class="header-img">
                    <img src="imagenes/pizza.png" alt="">
                </div>
            </div>
        </header>

        <!--MENU (SOLO FALTA CAMBIAR LAS FOTOS PRECIO Y NOMBRE DE PRODUCTO)-->
    <main class="products container" id="lista-1">
            <h2>MENU</h2>

    
            <div class="product-content">
                <!--PRODUCTO 2-->


                <!--PRODUCTO 3-->
                <?php
        $sql = "SELECT id_producto, nombre_producto, tamanio, precio FROM productos";
        $result = $conexion->query($sql);
        // Mostrar productos
        
         // Verificar si la consulta fue exitosa
         if ($result === false) {
            echo "Error al ejecutar la consulta: " . $conexion->error;
        } else {
            // Mostrar productos si la consulta fue exitosa
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id_producto = $row["id_producto"];
                    $nombre_producto = $row["nombre_producto"];
                    $tamanio  = $row['tamanio'];
                    $precio = $row["precio"];
                    // Suponiendo que las imágenes se llaman (id).jpg
                    //se tienen que agregar primero las imagenes antes que los demas datos en la bd
                    $imagen_url = "imagenes/producto/$id_producto.jpg";
                    
                    // Verificar si la imagen existe antes de mostrarla
                    if (file_exists($imagen_url)) {
                        ?>
                        <div class="product">
                            <img src="<?php echo $imagen_url; ?>" alt="<?php echo $nombre_producto; ?>">
                            <div class="product-txt">
                                <h3><?php echo $nombre_producto; ?></h3>
                                <p class="precio">$<?php echo $precio; ?></p>
                                <p class="tamanio"><?php echo $tamanio; ?></p>
                                <a href="#" class="agregar-carrito btn-2" data-id="<?php echo $id_producto; ?>">Agregar</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        echo "La imagen para el producto $id_producto no se encontró.";
                    }
                }
            } else {
                echo "No se encontraron productos.";
            }
        }
        ?>
        </div>
          

        <!--este es una prueba, a ver si se peuden ver las imagnees de otra forma
    -->
       

            
        </main>

        <!--UBICACION-->
        <section id="ubicacion">
            <div class="ubicacion-info">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238020.33565012258!2d-89.84124916440555!3d21.22916207251691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f55c5411186919b%3A0xdffd6ff74fd52ecc!2sPIZZERIA%20LEO&#39;S!5e0!3m2!1ses-419!2smx!4v1712356801324!5m2!1ses-419!2smx" 
                width="600" height="450" style="border:0;" 
                allowfullscreen="" loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="ubicacion-text">
                <h1>UBICACIÓN</h1>
                <p>Chicxulub, 97330 Chicxulub, Yuc.</p>
            </div>
        </section>


        <!--PIE DE PAGINA-->
        <footer class="footer" id="contactanos">
            <h1>CONTACTANOS</h1>
            <div class="footer-content container">
                <div class="social-link">
                    <a href="https://www.facebook.com/profile.php?id=100063630515985&mibextid=JRoKGi" target="_blank">
                        <img src="iconos/facebook_icon.png" alt="Facebook">
                    </a>
                    <span>Facebook</span>
                </div>
                <div class="social-link">
                    <a href="https://wa.me/9992198235" target="_blank">
                        <img src="iconos/whatsapp_icon.png" alt="WhatsApp">
                    </a>
                    <span>WhatsApp</span>
                </div>
                <div class="social-link">
                    <a href="tel:+529992198235" target="_blank">
                        <img src="iconos/phone_icon.png" alt="Phone">
                    </a>
                    <span>999 219 8235</span>
                </div>
            </div>
        </footer>


        <script src="js/index.js"></script>
    </body>
</html>