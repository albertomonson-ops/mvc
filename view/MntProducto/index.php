<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("../../mainhead.php"); ?>
</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once("../../mainleftsidebar.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Topbar -->
            <?php require_once("../../mainuserinfo.php"); ?>

            <!-- Page Content -->
            <div class="container-fluid">

                <h1 class="h3 mb-4 text-gray-800">Mantenimiento de Producto</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <button type="button" id="btnnuevo" class="btn btn-outline-primary btn-block mg-b-10">
                            Nuevo Registro
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="producto_data" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Container Fluid -->

        </div>
        <!-- End Content Wrapper -->

    </div>
    <!-- End Wrapper -->

    <?php require_once("modalmantenimiento.php"); ?>
    <?php require_once("../../mainjs.php"); ?>

</body>
</html>
