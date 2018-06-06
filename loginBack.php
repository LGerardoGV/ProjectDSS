<?php
    include("php/conn.php");
    $con=Conectar();
    $correo=$_POST['correo'];
    $correo=stripcslashes($correo);
    $correo=mysqli_real_escape_string($con,$correo);

    $password=$_POST['password'];
    $password=stripcslashes($password);
    $password=mysqli_real_escape_string($con,$password);

    session_start();
    //$passwordm = md5($password);
    $query="Select count(*) as total from usuarios where correo='{$correo}' and password= '{$password}';";
    $query2="Select * from usuarios where correo='{$correo}' and password= '{$password}';";
    $r=EjecutarQuery($con,$query);
    $d=EjecutarQuery($con,$query2);

    $impri=mysqli_fetch_assoc($r);
    $sesion = mysqli_fetch_assoc($d);

    if($impri['total']){
        $_SESSION['usu_pass']=$password;
        $_SESSION['usu_correo']=$sesion['correo'];
        //$ses = $_SESSION['usu'];

        header('Location: php/tablas.php');

    }
    else{

        echo "El usuario o contraseña son incorrectos";
    }

    Desconectar($con);
?>
