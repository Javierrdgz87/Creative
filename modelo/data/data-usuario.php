<?
    // obtiene los datos de un usuario en especifica
    require_once(dirname(dirname(__file__)).'/conexion.php');

    // $db->setTrace (true);
    (isset($_GET['v1']) && $_GET['v1'] ? $db->where('eCodUsuario', $_GET['v1']) : '');

    $db->orderBy('tNombre', 'ASC');
    $rsUsuario = $db->get('sisusuarios');
    $json = array();
    $jsonUsuario = array();
    foreach($rsUsuario as $rUsuario){
        $json['eCodUsuario'] = $rUsuario['eCodUsuario'];
        $json['tNombre'] = utf8_encode($rUsuario['tNombre']. ' ' . $rUsuario['tApellidos']);
        array_push($jsonUsuario, $json);
    }
    echo json_encode($jsonUsuario);
?>