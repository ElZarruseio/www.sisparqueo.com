<?php
include('../app/config.php');
include('../layout/admin/datos_usuario_sesion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include('../layout/admin/menu.php'); ?>
    <div class="content-wrapper">
        <br>
        <div class="container">

            <h2>Eliminación de nuemero de espacio?</h2>

            <br>
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h3 class="card-title">¿Esta seguro de eliminar el numero de espacio?</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <?php
            $id_map = $_GET['id'];
            $query_mapeos = $pdo->prepare("SELECT * FROM tb_mapeos WHERE id_map = '$id_map' AND estado = '1' ");
            $query_mapeos->execute();
            $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
            foreach($mapeos as $mapeo){
                $id_map = $mapeo['id_map'];
               
            }
            ?>

                        <div class="card-body" style="display: block;">

                        
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="mapeo-de-vehiculos.php" class="btn btn-default btn-block">Cancelar</a>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-danger btn-block" id="btn_borrar">
                                        Eliminar
                                    </button>
                                </div>
                            </div>

                            <div id="respuesta">

                            </div>


                        </div>

                    </div>



                </div>
            </div>

        </div>

    </div>
    <!-- /.content-wrapper -->
    <?php include('../layout/admin/footer.php'); ?>
</div>
<?php include('../layout/admin/footer_link.php'); ?>
</body>
</html>


<script>
    $('#btn_borrar').click(function () {

        var id_map = '<?php echo $id_map_get; ?>';

            //alert("se elimino correctamente");
            var url = 'controller_delete.php';
            $.get(url,{id_map:id_map},function (datos) {
                $('#respuesta').html(datos);
            });

    });
</script>
