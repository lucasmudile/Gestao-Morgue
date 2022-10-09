



  </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

  <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
           <form method="post">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja terminar a sessão?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"><?php echo $_SESSION['usuario'];?></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <a class="btn btn-primary" name="sair" id="sair" href="../logAut.php">Sair</a>
                </div>
            </div>

            </form>



        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../src/vendor/jquery/jquery.min.js"></script>
    <script src="../src/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../src/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../src/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../src/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../src/js/demo/chart-area-demo.js"></script>
    <script src="../src/js/demo/chart-bar-demo.js"></script>
    <script src="../src/js/demo/chart-pie-demo.js"></script>

        <script src="../src/Chart.bundle.js"></script>
    <script src="../src/utils.js"></script>
     <script src="../src/Chart.min.js"></script>



<?php

include('../model/grafico.php');
include('../controller/grafico.php');


$grafico=new CrudGrafico();
//Depositados de todos os meses
$depositados=$grafico->depositados();
//Levantados de todos os meses
$levantados=$grafico->levantados(); 

//depositado do dia
$depositadosDia=$grafico->depositoHoje();
//levantado do dia
$levantadosDia=$grafico->levantadosHoje(); 


    foreach ($depositados as $key => $value) {
    }

    foreach ($levantados as $key => $levantado) {
        # code...
    }


    foreach ($depositadosDia as $key => $deHoje) {
    }

    foreach ($levantadosDia as $key => $leDia) {
    }







?>

<script type="text/javascript">

new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    datasets: [{ 
        data: [' <?php echo $value->getJaneiro(); ?>',' <?php echo $value->getFevereiro(); ?>',' <?php echo $value->getMarco(); ?>',' <?php echo $value->getAbril(); ?>',' <?php echo $value->getMaio(); ?>',' <?php echo $value->getJunho(); ?>',' <?php echo $value->getJulho(); ?>',' <?php echo $value->getAgosto(); ?>',' <?php echo $value->getSetembro(); ?>',' <?php echo $value->getOutubro(); ?>',' <?php echo $value->getNovembro(); ?>',' <?php echo $value->getDezembro(); ?>'],
        label: "Depositdados",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [' <?php echo $levantado->getJaneiro(); ?>',' <?php echo $levantado->getFevereiro(); ?>',' <?php echo $levantado->getMarco(); ?>',' <?php echo $levantado->getAbril(); ?>',' <?php echo $levantado->getMaio(); ?>',' <?php echo $levantado->getJunho(); ?>',' <?php echo $levantado->getJulho(); ?>',' <?php echo $levantado->getAgosto(); ?>',' <?php echo $levantado->getSetembro(); ?>',' <?php echo $levantado->getOutubro(); ?>',' <?php echo $levantado->getNovembro(); ?>',' <?php echo $levantado->getDezembro(); ?>'],
        label: "Levantados",
        borderColor: "#3cba9f",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Total de Depositados e Levantados do ano corrente'
    }
  }
});


</script>

<script type="text/javascript">
    


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';


Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Depositados", "Levantados"],
    datasets: [{
      data: [' <?php echo $deHoje->getHoje(); ?>', ' <?php echo $leDia->getHoje(); ?>'],
      backgroundColor: ['#3e95cd', '#1cc88a'],
      hoverBackgroundColor: ['#4e73df', '#17a673'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: true
      
    },
     title: {
      display: true,
      text: 'Total de Depositados e Levantados do dia corrente'
    },
    cutoutPercentage: 80,
  },
});




</script>



</body>

</html>


      