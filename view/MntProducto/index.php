<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mantenimiento de Producto</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet">
    <link href="/mvc/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- SB Admin 2 Base Styles -->
    <link href="/mvc/public/css/sb-admin-2.min.css" rel="stylesheet">
       <!-- Custom styles for this page -->
    <link href="/mvc/public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom Styling -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            opacity: 0;
            transition: opacity 0.4s ease-in;
            background-color: #f8f9fc;
        }
        body.loaded {
            opacity: 1;
        }

        /* Sidebar styling */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364) !important;
        }
        .sidebar .nav-link {
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.08);
            border-left: 4px solid #00bcd4;
        }
        .sidebar .sidebar-heading {
            font-size: 0.75rem;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.5);
        }
        .sidebar .nav-link i {
            font-size: 1.1rem;
            margin-right: 8px;
        }

        /* Topbar */
        .topbar {
            background: white;
            border-bottom: 1px solid #e3e6f0;
            padding: 0.5rem 1rem;
        }
        .topbar .navbar-search input {
            border-radius: 50px;
        }

        /* Page Content */
        .content-wrapper {
            padding: 2rem;
        }
    </style>
</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/mvc/view/Home/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CRUD<sup>2</sup></div>
            </a>

            <hr class="sidebar-divider my-0">

            <!-- Home -->
            <li class="nav-item">
                <a class="nav-link" href="/mvc/view/Home/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>HOME</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Módulos
            </div>

            <!-- Mantenimiento -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Mantenimiento</span>
                </a>
                <div id="collapseTwo" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/mvc/view/MntProducto/">Producto</a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- End Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">
                <!-- Search Bar -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- User Info -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                            <img class="img-profile rounded-circle" src="/mvc/public/img/undraw_profile_2.svg" width="32">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                            <a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Salir</a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Page Content -->
            <div class="content-wrapper">
                <h1 class="h3 mb-4 text-gray-800">Mantenimiento de Producto</h1>
                                <!-- Your page content here -->

                     <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
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
                                <th></th>
                                <th></th>
                                </tr>
                            </thead>
                    <tbody></tbody>
                 </table>
            </div>
        </div>
        
    </div>

    <?php require_once("modalmantenimiento.php");?>
    

    <!-- Scripts -->
    <script src="/mvc/public/vendor/jquery/jquery.min.js"></script>
    <script src="/mvc/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/mvc/public/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/mvc/public/js/sb-admin-2.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.classList.add("loaded");
        });
    </script>
    <script type="text/javascript" src="mntproducto.js"></script>
    <!-- Page level plugins -->
    <script src="/mvc/public/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/mvc/public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="/mvc/public/vendor/datatables/dataTables.buttons.min.js"></script>
    <script src="/mvc/public/vendor/datatables/buttons.html5.min.js"></script>
    <script src="/mvc/public/vendor/datatables/buttons.colVis.mis.js"></script>
    <script src="/mvc/public/vendor/datatables/jszip.min.js"></script>

<!-- <script src="/mvc/public/js/sweetaler.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

<!--<link href="/mvc/public/css/buttons.dataTables.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">  
<link href="/mvc/public/css/all.min.css" rel="stylesheet">
<link href="/mvc/public/css/ionicons.min.css" rel="stylesheet">
<link href="/mvc/public/css/perfect-scrollbar.min.css" rel="stylesheet">
<link href="/mvc/public/css/jquery.switchButton.css" rel="stylesheet">
<link href="/mvc/public/css/jquery.dataTables.min.css" rel="stylesheet">


    <!-- Page level custom scripts -->
    <script src="/mvc/public/js/demo/datatables-demo.js"></script>
   

</body>
</html>
