<?
    require_once(dirname(dirname(__file__)).'/conexion.php');

    // Funcion que guarda la asignación de la tarea con el usuario
    if($_POST['eAccion'] == 1){
        $exito = 0;
        $descripcion = "";
        try{
            // actualiza los datos de la tarea a asignar al usuario
            $eCodTarea      = ($_POST['eCodTarea']      ? $_POST['eCodTarea']       : NULL);
            $eCodUsuario    = ($_POST['eCodUsuario']    ? $_POST['eCodUsuario']     : NULL);
            $aTarea = 
                Array(
                    'tCodEstatus' => 'EP',
                    'eCodUsuario' => $eCodUsuario
                );
            // $db->setTrace (true);
            $db->where('eCodTarea', $eCodTarea);
            if($db->update('BitTareas', $aTarea)){
                $exito = 1;
                print '<input type="hidden" id="bCodigo" name="bCodigo" value="'.$eCodTarea.'" />';
            }else{
                $exito = 0;
                $descripcion .= 'Fallo la inserción: ' . $db->getLastError();
            }
            print_r ($db->trace);

        }catch(Exception $e){
            $descripcion .= $e->getMessage();
        }
        return array('descripcion'=>$descripcion, 'exito'=>$exito);
    }
    // funcion para guardar la finalización de la tarea, asi como asignar la duración de la tarea
    if($_POST['eAccion'] == 2){
        $exito = 0;
        $descripcion = "";
        try{
            $eCodTarea      = ($_POST['eCodTarea']      ? $_POST['eCodTarea']       : NULL);
            $aTarea = 
                Array(
                    'tCodEstatus' => 'TE',
                    'fhFechaFinalizacion' => $db->now()
                );

            $db->where('eCodTarea', $eCodTarea);
            if($db->update('BitTareas', $aTarea)){
                // obtiene los datos de fecha de creacion y finalizacion
                $db->where('eCodTarea', $eCodTarea);
                $fhFecha = $db->getOne('BitTareas', 'fhFechaCreacion, fhFechaFinalizacion');

                $fhFechaCreacion = new DateTime($fhFecha['fhFechaCreacion']);
                $fhFechaFinalizacion = new DateTime($fhFecha['fhFechaFinalizacion']);
                $intervalo = $fhFechaCreacion->diff($fhFechaFinalizacion);
                $aTarea = 
                    Array(
                        'tmHora' => $intervalo->h.':'.$intervalo->i.':'.$intervalo->s
                    );

                // guarda la duración que tardo en reliarce la tarea
                $db->where('eCodTarea', $eCodTarea);
                $db->update('BitTareas', $aTarea);

                $exito = 1;
                print '<input type="hidden" id="bCodigo" name="bCodigo" value="'.$eCodTarea.'" />';
            }else{
                $exito = 0;
                $descripcion .= 'Fallo la inserción: ' . $db->getLastError();
            }
            // print_r ($db->trace);

        }catch(Exception $e){
            $descripcion .= $e->getMessage();
        }
        return array('descripcion'=>$descripcion, 'exito'=>$exito);
    }
?>