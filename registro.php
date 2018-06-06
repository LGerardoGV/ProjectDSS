<html>
	<head>
		<link rel="stylesheet" href="css/estilo_menu.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<title>Registrate</title>
		<style>
		.alinCajas{
			margin: 10px 0px 10px 0px;
			width: 280;
			text-align: center;
		}

		::placeholder{
			color: #E6E6E6;
    		opacity: 1;
		}

		</style>
	</head>
	<body style="background-color: #ECF0F1">
		<div class="container centConten">
			<form action="registroBack.php" method="post">
				<div class="row">
					<h3 style="margin-left: 115px; margin-top: 115px;">Registro</h3>
				</div>

				<div class="row centConten" style="margin-bottom: 25px;  margin-top: -10px;">
					<div class="cirPeque fondoAzul"></div>
					<div class="cirPeque fondoAmarillo"></div>
					<div class="cirPeque fondoRojo"></div>
				</div>

				<div class="row">
					<div class="lineaRdn fondoBlanco alinCajas" style="width: 36px; padding: 8px;">
						<img src="img/profile.png" style="height: 20px; width: 20px;">
					</div>
					<input required type="text" id="usuario" name="usuario" placeholder="Usuario" class="lineaRdn fondoBlanco alinCajas" style="margin-left: 20px;">
				</div>

				<div class="row">
					<div class="lineaRdn fondoBlanco alinCajas" style="width: 36px; padding: 8px;">
						<img src="img/email.png" style="height: 20px; width: 20px;">
					</div>
					<input required type="email" id="email" name="correo" placeholder="tucorreo@gmail.com"  class="lineaRdn fondoBlanco alinCajas" style="margin-left: 20px;">
				</div>

				<div class="row">
					<div class="lineaRdn fondoBlanco alinCajas" style="width: 36px; padding: 8px;">
						<img src="img/key.png" style="height: 20px; width: 20px;">
					</div>
			 		<input required type="password" id="pass" name="password" placeholder="Contraseña" class="lineaRdn fondoBlanco alinCajas" style="margin-left: 20px;">
			 	</div>

			 	<div class="row">
			 		<div class="lineaRdn fondoBlanco alinCajas" style="width: 36px; padding: 8px;">
						<img src="img/key.png" style="height: 20px; width: 20px;">
					</div>
			 		<input required type="password" id="pass2" name="password2" placeholder="Confirmar contraseña" class="lineaRdn fondoBlanco alinCajas" style="margin-left: 20px;">
			 	</div>

			 	<div class="row">
			 		<input type="submit" name="btnLogin" id="btnLogIn" value="Regístrame" class="lineaRdn fondoAzul texBlanco" style="margin-left: 0px; margin-top: 20px; width: 100%;">
			 	</div>

			 	<div class="row">
			 		<a href="index.php" style="margin-top: -20px; margin-left: 140px; text-align: center;">¡Volver!</a>
			 	</div>
			</form>
	  </div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>