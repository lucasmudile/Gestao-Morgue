

<?php


include_once('../model/cadaver.php');
include_once('../controller/crud-cadaver.php');

include_once('../model/funcionario.php');
include_once('../controller/crud-funcionario.php');

include_once('../model/levantamento.php');
include_once('../controller/crud-levantamento.php');



$select       = new CrudCadaver();
$cadaver   = $select->select();

$select       = new CrudFuncionario();
$funcionario   = $select->select();

$select       = new CrudLevantamento();
$levantamento   = $select->select();


# INCLUIDON O CABEÇALHO
include('includes/header.php');

?>



  <div class="container-fluid">


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Gestão de Morgue</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                             <a href="cadaver/ver.php" style="text-decoration: none">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Depositados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($cadaver); ?></div>
                                        </div>
                                           <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <a href="levantamento/ver.php" style="text-decoration: none">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Levantados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($levantamento); ?></div>
                                        </div>
                                       <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>



                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <a href="funcionario/ver_funcionario.php" style="text-decoration: none">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Funcionários
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo count($funcionario); ?></div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                    <i class="fas fa-address-card fa-2x text-gray-300"></i>
                                  </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>

                    
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
               
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="line-chart"></canvas>
                                    </div>
                                </div>



                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <!-- <i class="fas fa-circle text-primary"></i>  -->
                                        </span>
                                        <span class="mr-2">
                                            <!-- <i class="fas fa-circle text-success"></i>  -->
                                        </span>
                                        <span class="mr-2">
                                            <!-- <i class="fas fa-circle text-info"></i>  -->
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>





                  











<?php  include('includes/footer.php');?>