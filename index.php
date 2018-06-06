<html>
	<head>
		<link rel="stylesheet" href="css/estilo_menu.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<title>Registrase</title>

		<style>
		.centConten{
			display: flex;
			justify-content: center;
			text-align: center;
		}
		.lineaBlanca{
			margin: 10px 0px 10px 0px;
			width: auto;
			text-align: center;

		}
		.btnColor{
			background-color: #2ECC71; 
			color: white;
		}

		.img>img{
			margin-top: 125px;
			width: 125px;
			height: 125px;
		}

		::placeholder{
			color: #E6E6E6;
    		opacity: 1;
		}
		</style>
		
	</head>
	<body style="background-color: #ECF0F1">
		<div class="contenedor centConten">
			<div class="login">
				<div class="img">
					<img src="img/gas-station.png" alt="">
				</div>
				<div class="txt">
					<br>
					<div class="cirPeque fondoAzul"></div>
					<div class="cirPeque fondoAmarillo"></div>
					<div class="cirPeque fondoRojo"></div>
					<p>Inicio de session</p> 
				</div>
				
				<form action="loginBack.php" id="form" method="post">
					<br>
					<div class="lineaBlanca" style="width: 36px; padding: 8px;">
						<img src="img/email.png" style="height: 20px; width: 20px;">
					</div>
					<input style="width: 280px; margin-left: 15px;" class="lineaBlanca" type="email" name="correo" placeholder="Correo electronico" id="usuario">

					<br>
					<div class="lineaBlanca" style="width: 36px; padding: 8px;">
						<img src="img/key.png" style="height: 20px; width: 20px;">
					</div>
					<input style="width: 280px; margin-left: 15px;" class="lineaBlanca" type="password" name="password" placeholder="Contraeña" id="pass">


					<br><input class="lineaBlanca btnColor" style="width: 331px;" type="submit" name="<?php ?>" id="btnLogIn">
					<p class="liga">¿No tienes cuenta?<a href="registro.php">Registrate</a></p>
					<p class="liga" style="margin-top: -18px;">¿Olvidaste tu contraseña?<a href="fContrasena.php">Recuperar</a></p>
				</form>
			</div>
		</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
</html>