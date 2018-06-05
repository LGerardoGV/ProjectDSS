<html>
    <head>
      <title>Registrate</title>
      <link rel="stylesheet" type="text/css" href="styleRegistro.css"></link>
    </head>
    <body>
        <div class="container">
          <img src="user.png">
            <div class="txt">
              <p>Registro</p>
            </div>
            <form action="registroBack.php" method="post">
              <input required type="text" id="usuario" name="usuario" placeholder="Usuario"><br>
              <input required type="email" id="email" name="correo" placeholder="tucorreo@gmail.com"><br>
              <input required type="password" id="pass" name="password" placeholder="Contraseña"><br>
              <input required type="password" id="pass2" name="password2" placeholder="Confirmar contraseña"><br>
              <input type="submit" name="btnLogin" id="btnLogIn" value="enviar">
              <a href="index.php">¡Volver!</a>
            </form>
      </div>
    </body>
</html>