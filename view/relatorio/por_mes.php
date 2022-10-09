
<?php  include('../includes/header-sub.php');?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-left">
                            <h1 class="h4 text-gray-900 mb-2 font-weight-bold" style="text-transform: uppercase">
                                Relatório mensal
                            </h1>
                        </div>
                        <form class="user" action="por_mes.php" method="POST" name="mensal">
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                     <select style="border-radius: 30px;height: 50px;" class="form-control" id="mes" name="mes">
                                        <option value="1">Janeiro</option>
                                        <option value="2">Fevereiro</option>
                                        <option value="3">Março</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Maio</option>
                                        <option value="6">Junho</option>
                                        <option value="7">Julho</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="submit" class="btn btn-primary btn-user " name="guardar" value="Pesquisar" style="border-radius: 30px;height: 50px;">
                                </div>
                                 <div class="col-sm-4 mb-3 mb-sm-0">
                                    <?php if (isset($_REQUEST['mes'])) {
                                        $mes=$_REQUEST['mes'];
                                    ?>
                                    <a href="mes.php?mes=<?php echo $mes?>" class="btn btn-primary btn-user " style="border-radius: 30px;height: 50px;">Imprimir</a>
                                    <?php }else{?>
                                           <a href="teste.php" class="btn btn-primary btn-user " style="border-radius: 30px;height: 50px;">Imprimir</a>
                                    <?php }?>

                                </div>
                             
                            </div>
                            <hr>
                             <?php
                                include_once('../../controller/crud-relatrio.php');
                                $crud= new CrudRelatorio();
                                $model=new Relatorio();
                                $res=0;

                                if (isset($_REQUEST['mes'])) {
                                $model->setRelMensal($_REQUEST['mes']);
                                $dados = $crud->relMes($model);
                                }else{
                                $dados=$crud->relMes($model);
                                }
                                
                                if (!empty($dados)) {
                                foreach ($dados as $key) {
                                $res++;
                                } 
                                }

                                ?>resultado da pesquisa:<?php echo $res; ?>
                        </form>
                       

                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">BI</th>
                                    <th scope="col">Sexo</th>
                                    <th scope="col">DataNascimento</th>
                                    <th scope="col">Proveniência</th>
                                    <th scope="col">Residente</th>
                                    <th scope="col">Funcionario</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (!empty($dados)) {
                                    
                                  foreach ($dados as $key => $value) {
                                    
                                echo '<tr>

                                <td>'.$value->getNome().'</td>
                                <td>'.$value->getBi().'</td>
                                <td>'.$value->getSexo().'</td>
                                <td>'.$value->getDataNascimento().'</td>
                                <td>'.$value->getIdProveniencia().'</td>
                                <td>'.$value->getResidente().' </td>
                                <td>'.$value->getIdUsuario().'</td>
                                </tr>';
                                }
                                }else {
                                    // echo '<tr><td colspan="7"> resultado da pesquisa:'.$res.'</td></tr>';
                                }
                               
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  include('../includes/footer-sub.php');?>