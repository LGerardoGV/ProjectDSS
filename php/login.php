<html>
    <head>
    <title>Registrase</title>
        
    </head>
    <body>
        <style>
        /*
            ::-webkit-input-placeholder { color: white; } 
            :-moz-placeholder { color: white; } 
            ::-moz-placeholder { color: white; } 
            :-ms-input-placeholder { color: white; }
                *{
                    margin: 0;
                    padding: 0;
                    font-family: 'Roboto', sans-serif;
                            font-weight: lighter;

                }   
                body, html{
                    width: 100%;
                    height: 100%;
                    background: url(fondo.jpg);

                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                }

                .contenedor{
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0,0,0,.8);

                }
                .login{
                    width: 60%;
                    height: 60%;
                    
                    margin-left: 20%;

                }
                .img{
                    width: 40%;
                    margin-left: 40%;
                    margin-bottom: 30px;

                    
                }
                .img>img{
                    width: 50%;
                    height: 50%;
                    margin-top: 50px;
                }
                .txt{
                    width: 100%;
                    text-align: center;
                    font-size: 2em;
                    margin-top: 15px;
                    margin-bottom: 15px;
                    color: white;
                }    
                .txt>p{
                    color:#F9540C;
                }
                .input{
                    width: 80%;
                    
                    margin-left: 10%;

                }
                input[type=email],input[type=password]{
                    width: 100%;
                    height: 40px;
                    padding-left: 20px;
                    font-size: 1em;
                    margin-bottom: 10px;
                    background-color: rgba(0,0,0,0);
                    border: none;
                    border-bottom: 1px solid #a9a9a9;
                    color: white;
                    outline: none;   
                    transition: all .4s;
                    box-sizing: border-box;
                }
                input[type=password]{
                    margin-bottom: 50px;
                }
                input[type=email]:focus{
                height: 50px;
                border-bottom: 1px solid #F9540C;

                }
                input[type=password]:focus{
                height: 50px;
                border-bottom: 1px solid #F9540C;

                }
                input[type=submit]{
                    width: 60%;
                    height: 40px;
                    border-radius: 5px;
                    font-size: 1em;
                    margin-left: 20%;
                    background-color: rgba(0,0,0,0);
                    border: 1px solid white;
                    color: white;
                    transition: ease .1s;
                    outline: none;
                    margin-bottom: 35px;
                }
                input[type=submit]:active{

                    background-color: #F9540C;
                    border: none;
                    color: white;
                }
            .liga{
                width: 60%;
                height: 40px;
                border-radius: 5px;
                font-size: 1em;
                margin-left: 20%;
                background-color: rgba(0,0,0,0);
                color: white;
                transition: ease .1s;
                outline: none;
                margin-bottom: -19px;
            }

            */
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
    </body>
</html>