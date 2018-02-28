<?
    // obtiene los datos de una tarea en especifica
    require_once(dirname(dirname(__file__)).'/conexion.php');

    $db->join('SisEstatus se', 'se.tCodEstatus = bt.tCodEstatus', 'LEFT');
    $db->join('SisUsuarios su', 'su.eCodUsuario = bt.eCodUsuario', 'LEFT');
    (isset($_GET['v1']) && $_GET['v1'] ? $db->where('eCodTarea', $_GET['v1']) : '');

    $rsTarea = $db->get('bittareas bt', null, 'bt.*, se.tNombre As Estatus');

    $json = array();
    $jsonTarea = array();
    foreach($rsTarea as $rTarea){
        $json['eCodTarea'] = $rTarea['eCodTarea'];
        $json['tNombre'] = utf8_encode($rTarea['tNombre']);
        $json['fhFechaCreacion']= date("d/m/Y H:i", strtotime($rTarea['fhFechaCreacion']));
        $json['Estatus'] = utf8_encode($rTarea['Estatus']);
        array_push($jsonTarea, $json);
    }
    echo json_encode($jsonTarea);
?>