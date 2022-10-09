<?php
session_start();
if (!$_SESSION['usuario']) {
    header('Location: ../');
}
?>

 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../../src/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../src/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

           <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users fa-cog"></i>
                    <span>Funcionario</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../funcionario/">Funcionários</a>
                        <a class="collapse-item" href="../funcionario/ver_funcionario.php">Ver Funcionários</a>
                        <a class="collapse-item" href="../funcionario/user.php">Usuários</a>
                        <a class="collapse-item" href="../funcionario/ver_usuario.php">Ver Usuários</a>

                         <a class="collapse-item" href="../funcao/">Função</a>
                        <a class="collapse-item" href="../funcao/ver_funcao.php">Ver Função </a>

                    </div>
                </div>
            </li>

        

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user-plus "></i>
                    <span>Depositar</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../cadaver/">Depositar corpos</a>
                        <a class="collapse-item" href="../cadaver/ver.php">Ver depositados</a>
                
                    </div>
                </div>
            </li>

                <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1"
                    aria-expanded="true" aria-controls="collapseUtilities1">
                    <i class="fas fa-ambulance"></i>
                    <span>Lenvatamento</span>
                </a>
                <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../levantamento/">Lenvatar Corpo</a>
                        <a class="collapse-item" href="../levantamento/ver.php">Ver levantados</a>
                       
                    </div>
                </div>
            </li>


                <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
                    aria-expanded="true" aria-controls="collapseUtilities2">
                    <i class="fas fa-th"></i>
                    <span>Camara</span>
                </a>
                <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../camara/">Cadastrar</a>
                        <a class="collapse-item" href="../camara/ver_camara.php">Ver</a>
                    </div>
                </div>
            </li>

                  <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities7"
                    aria-expanded="true" aria-controls="collapseUtilities7">
                    <i class="fas fa-fw fa-th-large"></i>
                    <span>Gaveta</span>
                </a>
                <div id="collapseUtilities7" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../gaveta/">Cadastrar</a>
                        <a class="collapse-item" href="../gaveta/ver_gaveta.php">Ver</a>
                    </div>
                </div>
            </li>


                      <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities6"
                    aria-expanded="true" aria-controls="collapseUtilities6">
                    <i class="fas  fa-user"></i>
                    <span>Grau Parentesco</span>
                </a>
                <div id="collapseUtilities6" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../grau_parentesco/">Cadastrar</a>
                        <a class="collapse-item" href="../grau_parentesco/ver_grau.php">Ver</a>
                    </div>
                </div>
            </li>
                        <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities5"
                    aria-expanded="true" aria-controls="collapseUtilities5">
                    <i class="fas fa-car"></i>
                    <span>Proveniencia</span>
                </a>
                <div id="collapseUtilities5" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../proveniencia/">Cadastrar</a>
                        <a class="collapse-item" href="../proveniencia/ver_proveniencia.php">Ver</a>
                    </div>
                </div>
            </li>


                   <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#autopsia"
                    aria-expanded="true" aria-controls="autopsia">
                    <i class="fas fa-car"></i>
                    <span>Autopsia</span>
                </a>
                <div id="autopsia" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../autopsia/registro.php">Registrar</a>
                         <a class="collapse-item" href="../autopsia/ver_registro.php">Ver Autopsia</a>
                        <a class="collapse-item" href="../autopsia/sala.php">Sala de Autopsia</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#relatorio"
                    aria-expanded="true" aria-controls="relatorio">
                    <i class="fas fa-car"></i>
                    <span>Relatórios</span>
                </a>
                <div id="relatorio" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../relatorio/por_mes.php">Por mes</a>
                        <a class="collapse-item" href="../relatorio/por_data.php">por data</a>
                        <a class="collapse-item" href="../relatorio/por_ano.php">por ano</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transferenca"
                    aria-expanded="true" aria-controls="transferenca">
                    <i class="fas fa-car"></i>
                    <span>Transferênça</span>
                </a>
                <div id="transferenca" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../transferenca/index.php">Tranferir</a>
                        <a class="collapse-item" href="../transferenca/ver.php">ver</a>
                    </div>
                </div>
            </li>

            
                <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transladacao"
                    aria-expanded="true" aria-controls="transladacao">
                    <i class="fas fa-car"></i>
                    <span>Transladação</span>
                </a>
                <div id="transladacao" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../transladacao/index.php">Cadastrar</a>
                        <a class="collapse-item" href="../transladacao/ver.php">ver</a>
                    </div>
                </div>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                      

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">

                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <button class="btn btn-primary rounded-circle"><?php echo substr($_SESSION['usuario'], 0,1) ?></button>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="padding: 5px;"><?php echo $_SESSION['usuario']?></span>
                              
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                 <div class="container-fluid">
              

              

          