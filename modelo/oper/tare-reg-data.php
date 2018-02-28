<?
    require_once(dirname(dirname(__file__)).'/conexion.php');

    // guarda
    $exito = 0;
    $descripcion = "";
    try{
        // guarda la tarea creada
        $tNombre    = ($_POST['tNombre']    ? $_POST['tNombre']     : NULL);
        $aTarea = 
            Array(
                'tCodEstatus' => 'PE',
                'fhFechaCreacion' => $db->now(),
                'tmHora' => '00:00',
                'tNombre' => $tNombre
            );
        // $db->setTrace (true);
        $codigo = $db->insert('BitTareas', $aTarea);
        // print_r ($db->trace);
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