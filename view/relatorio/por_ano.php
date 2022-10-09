
<?php  include('../includes/header-sub.php');?>
  <?php 
  $ano=date('Y');
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
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-12">
                    <div class="p-2">
                       
                      
                        <div class="text-left">
                            <h1 class="h4 text-gray-900 mb-2 font-weight-bold" style="text-transform: uppercase">
                                Relatório Anual
                            </h1>
                        </div>
                        <form class="user" action="por_ano.php" method="POST" name="mensal">
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                     <input type="text" class="form-control " id="ano"
                                            placeholder="Introduza o ano" name="ano" required>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="submit" class="btn btn-primary " name="guardar" value="Pesquisar">

                                </div>
                                 <div class="col-sm-4 mb-3 mb-sm-0">
                                     <div class="text-right">
                              <?php if (isset($_REQUEST['ano'])) {
                                        $ano=$_REQUEST['ano'];
                                    ?>
                                    <a href="ano.php?ano=<?php echo $ano?>" class="h4 mb-2 btn btn-sm btn-secondary shadow-sm"> <i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatório</a>
                                    <?php }else{?>
                                           <a href="ano.php" class="ml-auto btn btn-sm btn-secondary shadow-sm"> <i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatório</a>
                                    <?php }?>
                             <!-- <a href="../../util/relatorio/relatorio-candidato.php" class="ml-auto btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatório</a> -->
                        </div>
                               

                                </div> 
                            </div>
                            <hr>
                            <?php
                            include_once('../../controller/crud-relatrio.php');
                            $crud= new CrudRelatorio();
                            $model=new Relatorio();
                            
                            $res=0;

                            if (isset($_REQUEST['ano'])) {
                            $model->setRelAnual($_REQUEST['ano']);
                            $ano=$_REQUEST['ano'];
                            $dados=$crud->rel_anual($model);
                            }else{
                                $dados=$crud->rel_anual($model);
                            }

                          
                            ?>
                        </form>
                       

                        <table class="table table-bordered table-sm">
                            <thead class="bg-secondary text-white" style="text-transform: capitalize;">
                                <tr>
                                    <th>mes</th>
                                    <th class="text-center">corpos depositados por mes</th>
                                    <th class="text-center">nº de corpos no deposito</th>
                                    <th class="text-center">nº de corpos levantados</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php foreach ($mes as $key => $value){ 
                                    $corpos_depositados_por_mes = "select count(id_cadaver) as num from view_cadaver where month(data_registo)='$key' and YEAR(data_registo)=$ano";

                                    $resultado = mysqli_query($conn, $corpos_depositados_por_mes);
                                    $row = mysqli_fetch_assoc($resultado);

                                    // select count(id_cadaver) as num from cadaver where month(data_registo)=6 AND statu="Depositado"
                                    $corpos_no_deposito = "select count(id_cadaver) as depo from view_cadaver where month(data_registo)='$key'AND statu='$depositados' and YEAR(data_registo)=$ano";

                                    $resultado1 = mysqli_query($conn, $corpos_no_deposito);
                                    $row1 = mysqli_fetch_assoc($resultado1);

                                    $corpos_levantado = "select count(id_cadaver_) as leve from view_levantamento where month(data)='$key' and YEAR(data)=$ano";

                                    $resultado2 = mysqli_query($conn, $corpos_levantado);
                                    $row2 = mysqli_fetch_assoc($resultado2);
                                    ?>

                                    <tr>
                                    <td><?php echo $value ?></td>
                                    <td><?php /**/ if ($row['num']!=0 && $row['num']>0 ) {echo $row['num'];}else{echo "---";}  ?></td>
                                    <td><?php /**/ if ($row1['depo']!=0 && $row1['depo']>0 ) {echo $row1['depo'];}else{echo "---";}  ?></td>
                                    <td><?php /**/ if ($row2['leve']!=0 && $row2['leve']>0 ) {echo $row2['leve'];}else{echo "---";}  ?></td>

                                    <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  include('../includes/footer-sub.php');?>