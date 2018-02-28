<?php
    require_once(dirname(dirname(__file__)).'/conexion.php');

    $aDatos = [];

    parse_str($_POST['Datos'], $aDatos);
    $usuario = (isset($aDatos["tCorreo"]) ? $aDatos["tCorreo"] : 'NULL');
    $password = (isset($aDatos["tPassword"]) ? $aDatos["tPassword"] : 'NULL');
    $exito = 0;
    // verifica y crea las variables de sesión del usuario
    
    // $db->setTrace (true);
    $db->where('su.tCodEstatus', 'AC');
    $db->where('su.tCorreo', $usuario);
    $db->where('su.tPassword', $password);
    $rUsuario = $db->get('SisUsuarios su', 1, 'su.eCodUsuario, CONCAT(su.tNombre," ", su.tApellidos) AS Usuario, su.tCorreo, su.tPassword');
    // print_r ($db->trace);
    if ($db->count > 0){
        // Verifica si el usuario y contrasenia existen
        if($rUsuario[0]["tCorreo"]==$usuario && $rUsuario[0]["tPassword"]==$password){      
            session_start();
            $_SESSION["sesion"]["eCodUsuario"]=$rUsuario[0]["eCodUsuario"];
            $_SESSION["sesion"]["Usuario"]=$rUsuario[0]["Usuario"];
            $_SESSION["sesion"]["Correo"]=$rUsuario[0]["tCorreo"];
            $_SESSION["sesion"]["Inicia"]=date("Y-m-d H:i:s");
            $exito = 1;
        }else{
            $exito = 0;
            header('location: ../../app/login.php');
        }
    }
    echo $exito;
?>