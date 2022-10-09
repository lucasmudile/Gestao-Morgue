<?php  include('../includes/header-sub.php');?>
<div class="container"> 
	
  <div class="row mx-1">
    <form class="form-inline mr-auto  my-3 my-md-0 mw-100 navbar-search" method="GET">
      <div class="input-group">
       <input type="text" class="form-control bg-light border-0 shadow-lg"
        placeholder="Pesquisar por..." aria-label="Search"
        aria-describedby="basic-addon2" value="<?php echo isset($_GET['search'])? $_GET['search']:""?>" name="search">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">
              <i class="fas fa-search fa-sm"></i>
          </button>
        </div> 
      </div>
    </form>
    <a href="relatorio.php" class="ml-auto btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-download fa-sm text-white-50"></i>
      Gerar Relatório
    </a>
  </div>
  <div class="card o-hidden border-0 shadow-lg my-3">
  <div class="card">

      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-12">
            <div class="p-3 mt-2">
                <table class="table table-sm table-hover table-striped" style="height:200px" >
                  <thead>
                    <tr>
                      <th>mes</th>
                      <th>corpos depositados por mes</th>
                      <th>nº de corpos no deposito</th>
                    </tr>
                  </thead>
                  <tbody style="overflow-y: scroll;">
    <?php 
    $conn=mysqli_connect('localhost','root','','morgue');
    $depositados="Depositado";
    $mes[1]="Janeiro"; 
    $mes[2]="Fevereiro"; 
    $mes[3]="Março"; 
    $mes[4]="Abril"; 
    $mes[5]="Maio"; 
    $mes[6]="Junho"; 
    $mes[7]="Julho"; 
    $mes[8]="Agosto"; 
    $mes[9]="Setembro"; 
    $mes[10]="Outubro"; 
    $mes[11]="Novembro"; 
    $mes[12]="Dezembro";
     ?>
    <?php foreach ($mes as $key => $value){ 
$corpos_depositados_por_mes = "select count(id_cadaver) as num from cadaver where month(data_registo)='$key'";

$resultado = mysqli_query($conn, $corpos_depositados_por_mes);
$row = mysqli_fetch_assoc($resultado);

// select count(id_cadaver) as num from cadaver where month(data_registo)=6 AND statu="Depositado"
$corpos_no_deposito = "select count(id_cadaver) as depo from cadaver where month(data_registo)='$key'AND statu='$depositados'";

$resultado1 = mysqli_query($conn, $corpos_no_deposito);
$row1 = mysqli_fetch_assoc($resultado1);
      ?>

      <tr>
      <td><?php echo $value ?></td>
      <td><?php /**/ if ($row['num']!=0 && $row['num']>0 ) {echo $row['num'];}else{echo "---";}  ?></td>
      <td><?php /**/ if ($row1['depo']!=0 && $row1['depo']>0 ) {echo $row1['depo'];}else{echo "---";}  ?></td>
      
       <?php } ?>
    </tr>
    </tbody>
</table>
            </div>
          </div>
        </div>
      </div> 
  </div>
</div>
</div>
<?php  include('../includes/footer-sub.php');?>