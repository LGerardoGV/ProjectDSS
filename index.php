<html>
    <head>
        <link rel="stylesheet" href="css/estilo_menu.css" 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <title>Registrase</title>
        
    </head>
    <body>
        <style>
        
        </style>
        <div class="contenedor">
          <div class="login">
            <div class="img">
                  <img src="icono.png" alt="">
              </div>
              <div class="txt">
                  <p>Inicio de session</p> 
              </div>
                <form action="loginBack.php" id="form" method="post">
                      
                        <input type="email" name="correo" placeholder="Correo electronico" id="usuario">
                        <input type="password" name="password" placeholder="Contraeña" id="pass">
                        <input type="submit" name="<?php ?>" id="btnLogIn">
                        <p class="liga">¿No tienes cuenta?<a href="registro.php">Registrate</a></p>
                        <p class="liga">¿Olvidaste tu contraseña?<a href="fContrasena.php">Recuperar</a></p>
                </form>
            </div>
        </div>


    </style>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    </body>
</html>