<?php
    include("php/conn.php");
    $con=Conectar();
    $usuario=$_POST['correo'];
    $usuario=stripcslashes($usuario);
    $usuario=mysqli_real_escape_string($con,$usuario);

    $correo=$_POST['correo2'];
    $correo=stripcslashes($correo);
    $correo=mysqli_real_escape_string($con,$correo);

    $password=$_POST['password'];
    $password=stripcslashes($password);
    $password=mysqli_real_escape_string($con,$password);

    $password2=$_POST['password2'];
    $password2=stripcslashes($password2);
    $password2=mysqli_real_escape_string($con,$password2);



    session_start();

    //$sesion = $_SESSION['usu_id'];
    if($usuario=="" || $correo=="" || $password=="" || $password2 == "" ){
        echo "Hacen falta datos";
    }else{
        if ($password2=!$password) {
            # code...
        }else{
            $query= "SELECT correo FROM `usuarios`";

            $r= EjecutarQuery($con,$query);

            $valida = 1;
            while($impri=mysqli_fetch_array($r)){
                if($correo == $impri['correo']){
                    $valida = 0;
                    echo "Una cuenta con ese correo ya existe";
                }
            }

            if($valida == 1){
                $passwordm = md5($password);
                $query="INSERT INTO `usuarios` (`usuario`, `correo`, `password`) VALUES ('{$usuario}', '{$correo}', '{$password}');";
                    $d= EjecutarQuery($con,$query);
                //header('Location: fpregunta.php');
                $_SESSION['usu_correo']=$correo;
                $_SESSION['usu_nombre']=$usuario;

                header('Location: php/tablas.php');
            }
        }
    }

    Desconectar($con);
?>
