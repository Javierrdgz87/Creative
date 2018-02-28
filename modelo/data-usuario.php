<?
    require_once(dirname(dirname(__file__)).'/modelo/conexion.php');

    // guarda
    $exito = 0;
    $descripcion = "";
    try{
        // guarda los datos de registro del usuario
        parse_str($_POST['Datos'], $aDatos);
        $tNombre        = ($aDatos['tNombre']            ? $aDatos['tNombre']               : NULL);
        $tApellidos     = ($aDatos['tApellidos']         ? $aDatos['tApellidos']            : NULL);
        $tCorreo        = ($aDatos['tCorreoRegistro']    ? $aDatos['tCorreoRegistro']       : NULL);
        $tPassword      = ($aDatos['tPasswordRegistro']  ? $aDatos['tPasswordRegistro']     : NULL);
        $aUsuario = 
            Array(
                'tCodEstatus' => 'AC',
                'fhFecha' => $db->now(),
                'tNombre' => $tNombre,
                'tApellidos' => $tApellidos,
                'tCorreo' => $tCorreo,
                'tPassword' => $tPassword
            );
        $codigo = $db->insert('SisUsuarios', $aUsuario);
        if($codigo) {
            $descripcion .= 'Se ha insertado un nuevo registro con código: ' . $codigo;
            print '<input type="hidden" id="bCodigo" name="bCodigo" value="'.$codigo.'" />';
        } else {
            $exito = 0;
            $descripcion .= 'Fallo la inserción: ' . $db->getLastError();
        }

    }catch(Exception $e){
        $descripcion .= $e->getMessage();
    }
    return array('descripcion'=>$descripcion, 'exito'=>$exito);
?>