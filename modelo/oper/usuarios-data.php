<?
    // obtiene los registros de usuarios
    require_once(dirname(dirname(__file__)).'/conexion.php');

    parse_str($_POST['Datos'], $aFiltro);

    (isset($aFiltro['eCodUsuario']) && $aFiltro['eCodUsuario'] ? $db->where('su.eCodUsuario', $aFiltro['eCodUsuario']) : '');
    (isset($aFiltro['tNombre']) && $aFiltro['tNombre'] ? $db->where('su.tNombre', '%'.$aFiltro['tNombre'].'%', 'LIKE') : '');
    (isset($aFiltro['tCorreo']) && $aFiltro['tCorreo'] ? $db->where('su.tCorreo', $aFiltro['tCorreo']) : '');
    $rsConsumo = $db->get('sisusuarios su', null, 'su.eCodUsuario, su.fhFecha, su.tNombre, su.tApellidos, su.tCorreo');

    $json = array();
    $jsonConsumo = array();
    if ($db->count > 0){
        foreach($rsConsumo as $rConsumo){
            $json['eCodUsuario'] = sprintf("%07d", $rConsumo['eCodUsuario']);
            $json['fhFecha']= date("d/m/Y H:i", strtotime($rConsumo['fhFecha']));
            $json['Usuario']= $rConsumo['tNombre'].' '.$rConsumo['tApellidos'];
            $json['tCorreo']= $rConsumo['tCorreo'];
            array_push($jsonConsumo, $json);
        }
    }
    echo json_encode($jsonConsumo);
?>