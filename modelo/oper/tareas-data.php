<?
    // obtiene los registros de la tabla bittareas
    require_once(dirname(dirname(__file__)).'/conexion.php');

    parse_str($_POST['Datos'], $aFiltro);

    // $db->setTrace (true);
    $db->join('SisUsuarios su', 'su.eCodUsuario = bt.eCodUsuario', 'LEFT');
    (isset($aFiltro['eCodTarea']) && $aFiltro['eCodTarea'] ? $db->where('bt.eCodTarea', $aFiltro['eCodTarea']) : '');
    (isset($aFiltro['tNombre']) && $aFiltro['tNombre'] ? $db->where('bt.tNombre', '%'.$aFiltro['tNombre'].'%', 'LIKE') : '');
    $rsTarea = $db->get('bittareas bt', null, 'bt.eCodTarea, bt.fhFechaCreacion, bt.fhFechaFinalizacion, su.tNombre AS tNombreUsuario, su.tApellidos, bt.tmHora, bt.tNombre, bt.tCodEstatus');

    // print_r ($db->trace);
    $json = array();
    $jsonTarea = array();
    if ($db->count > 0){
        foreach($rsTarea as $rTarea){
            $json['eCodTarea'] = sprintf("%07d", $rTarea['eCodTarea']);
            $json['fhFechaCreacion']= date("d/m/Y H:i", strtotime($rTarea['fhFechaCreacion']));
            $json['fhFechaFinalizacion']= ($rTarea['fhFechaFinalizacion'] ? date("d/m/Y H:i", strtotime($rTarea['fhFechaFinalizacion'])) : '');
            $json['tmHora']= date("H:i", strtotime($rTarea['tmHora']));
            $json['Usuario']= utf8_encode($rTarea['tNombreUsuario'].' '.$rTarea['tApellidos']);
            $json['tNombre']= utf8_encode($rTarea['tNombre']);
            $json['tCodEstatus']= ($rTarea['tCodEstatus']);
            array_push($jsonTarea, $json);
        }
        echo json_encode($jsonTarea);
    }
?>