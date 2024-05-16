<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		
		<title> PIZZERIA LEO </title>
		<!--Iconos-->
        
		<link rel="stylesheet" href="css/RegiLog.css">
	</head>
	<body>
		
		<h2>¡Bienvenido a PIZZERIA LEO!</h2>

		<div class="container" id="container">
		

			<!--REGISTRARSE-->


			<div class="form-container sign-up-container">				
				<form action="registro.php" method="post">
					<h1>Crear una cuenta</h1>

					<input type="text" placeholder="Nombre" id= nombre name="nombre" required/>
					<input type="text" placeholder="Usuario" id=usuario name="usuario" required/>
                    <input type="text" placeholder="telefono" id= telefono name="telefono" required/>
                    <input type="email" placeholder="Correo" name="correo" />
					<input type="password" placeholder="Contraseña" name="contrasenia" required/>
					
					<button> Registrarse </button>
				</form>
			</div>

			<!--INICIAR SESION-->

			<div class="form-container sign-in-container">
				<form action="login.php" method="post">
					<h1>Iniciar sesión</h1>
					<input type="email" placeholder="Email" name="correo" required/>
					<input type="password" placeholder="Password" name="contrasenia" required/>
					<a> </a>
					<button>Iniciar Sesión</button>
				</form>
			</div>
			
			
			<div class="overlay-container">
				<div class="overlay">
					<div class="overlay-panel overlay-left">
						<h1>Bienvenido</h1>
						<p>Bienvenido a la PIZZERIA LEO, registrate para tener una mejor experiencia</p>
						<button class="ghost" id="signIn">Inicia Sesión</button>
					</div>
					<div class="overlay-panel overlay-right">
						<h1>Bienvenido</h1>
						<p>Inicia sesión y disfruta</p>
						<button class="ghost" id="signUp">Registrate</button>
					</div>
				</div>
			</div>

		</div>
		
		<script src="assets/js/main.js"></script>
		<script src="js//Regilog.js" defer></script>
	</body>

</html>
