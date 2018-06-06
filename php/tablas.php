<!doctype html>
<html lang="en">
  <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="../css/estilo_menu.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

	<title>Gasolina</title>

	<script src="../js/funciones.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  </head>
  <body style="background-color: #ECF0F1">
	<div class="container-fluid">
		<div class="row">
				<div style="outline: none;" >
				  <button class="comboCir lineaRdn fondoBlanco" style="outline: none; padding: 0px 6px 0 6px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="../img/ico_conf.png" id="btn_conf" style="height: 26px; width: 26px; margin-top: -3px;">
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Mi cuenta</a>
					<a class="dropdown-item" href="#">Nosotros</a>
					<a class="dropdown-item" href="#">Cerrar sesión</a>
				  </div>
				</div>

				<div class="lineaRdn fondoBlanco">
					<div class="cirPeque fondoAzul"></div>
					<div class="cirPeque fondoAmarillo"></div>
					<div class="cirPeque fondoRojo"></div>
					<div class="tex" style="margin-left: 10px;">EdgardoBalderas@conca.com</div>
				</div>


				<form action="" method="POST">
				<div class="lineaRdn fondoBlanco">
				  <select class="comboCir" name="frec" id="opciones">
						<option value="magna">Magna</option>
						<option value="premium">Premium</option>
				  </select>
				</div>

				<div class="lineaRdn fondoBlanco">
					<div class="tex">Valores: </div>
					<div class="fondoAzul cir">K</div>
					<!--Valor de K-->
					<input type="number" class="cajasValores texAzul tex" min="1" max="99" onkeyup="verificarK(this.value)" id="k" name="k" value= "<?php echo $_POST["k"]?>">

					<div class="fondoAmarillo cir">J</div>
					<!--Valor de K-->
					<input type="number" class="cajasValores texAmarillo tex" min="1" max="99" onkeyup="verificarJ(this.value)" id="j" name="j" value="<?php echo $_POST["j"];?>">

					<div class="fondoRojo cir">&alpha;</div>
					<input type="number" class="cajasValores texRojo tex" min="0" max="1" step="any" onkeyup="validarAlfa(this.value)" id="alfa" name="alfa" value="<?php echo $_POST["alfa"];?>">
				</div>

				<input onclick="loChido()" type="submit" class="lineaRdn fondoAzul texBlanco" value="Generar">
				</form>
		</div>

		<div class="row">
			<div id="tabla">
			<?php include('analizarDatos.php');
				calcular();
			?>
		</div>

		</div>

	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
