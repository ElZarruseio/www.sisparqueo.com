<?php

include('../app/config.php');

$id_map = $_GET['id_map'];
$estado_inactivo = "0";

date_default_timezone_set("America/bogota");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("UPDATE tb_mapeos SET
estado = :estado,
fyh_eliminacion = :fyh_eliminacion 
WHERE id_map = :id_map");

$sentencia->bindParam(':estado',$estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion',$fechaHora);
$sentencia->bindParam(':id_map',$id_map);

if($sentencia->execute()){
    echo "se elimino el registro de la manera correcta";
    ?>
    <script>location.href = "mapeo-de-vehiculos.php";</script>
    <?php
}else{
    echo "error al eliminar el registro";
}