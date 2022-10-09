
<?php  include('../includes/header-sub.php');?>


<?php
  include_once('../../controller/crud-autopsia.php');

?>

 

  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>

                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="">
                                <h1 class="h4 text-gray-900 mb-4">Cadastrar de Autospia</h1>
                            </div>
                            <form class="user" method="POST">
                              <hr>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select style="border-radius: 30px;height: 50px;" id="idsala" name="idsala" class="form-control">
                                       <?php
                                       $select = new CrudAutopsia();
                                       $select->salaId();
                                                ?>
                                    </select>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                         <select style="border-radius: 30px;height: 50px;" id="idcadaver" name="idcadaver" class="form-control">
                                       <?php
                                                  
                                                     $select = new CrudAutopsia();
                                                     $select->cadaverId();
                                                ?>
                                    </select>
                                    </div>

                 
                                </div>

                                <div class="form-group row">
                                 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <textarea class="form-control"
                                            id="obs" name="obs" placeholder="observação"></textarea>
                                    
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                         <input type="submit" class="btn btn-primary btn-user " name="guardar" value="Cadastrar">
                                    </div>
                 
                                </div>



                               
                                <hr>
                               
                            </form>

                             <?php
                              if (isset($_REQUEST['obs'])){
                                // setIdCadaver
                                // setIdSala
                                // setObs

                                $crud = new CrudAutopsia();
                                $model = new ModelAutopsia();
                                $model->setIdCadaver($_REQUEST['idcadaver']);
                                $model->setIdSala($_REQUEST['idsala']);
                                $model->setObs($_REQUEST['obs']);

                               $crud->insert($model);
                              }

                              ?>

                             
                        </div>

                    </div>
                    <div class="col-lg-12">
   <div class="p-5">                    
<div class="text-left">
    <h1 class="h4 text-gray-900 mb-2 font-weight-bold" style="text-transform: uppercase">
       listar Autopsia</h1>
</div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
           
            <th scope="col">Nome</th>
            <th scope="col">Sexo</th>
            <th scope="col">sala</th>
            <th scope="col">OBS</th>
            <th scope="col">Outras</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
          <?php
          $select = new CrudAutopsia();
          // $model = new ModelAutopsia();
                         
                        $dados;

                        if(isset($_GET['search'])) {
                            $search = $_GET['search'];
                            if($search != null) {
                                $dados = $select->search($search);
                            } else {
                                $dados = $select->select();
                            }
                        } else {
                            $dados = $select->select();
                        }
                        foreach ($dados as $key => $value) {
                           echo '<tr>
                                
                                    <td>'.$value->getNome().'</td>
                                    <td>'.$value->getBi().'</td>
                                     <td>'.$value->getSexo().'</td>
                                      <td>'.$value->getDataNascimento().'</td>
                                      <td>'.$value->getObs().' </td>
                                      <td>'.$value->getData().'</td>
                                    <td>'.$value->getIdUsuario().'</td>
                                    
                                      <td>
                                        <a href="#"  data-toggle="modal" data-target="#ver'.$value->getId().'" class="btn btn-outline-primary"><i class="fas fa-pen-alt"></i></a>
                                    </td>


                                      <td>
                                        <a href="registro_editar.php?id='.$value->getId().'" class="btn btn-outline-secondary"><i class="fas fa-pen"></i></a>
                                    </td>
                                 
                                    <td>
                                        <a href="#"  data-toggle="modal" data-target="#delete'.$value->getId().'" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>';
                        }

                        


                        ?>
    </tbody>
</table>
                    </div>
                </div>

            </div>
        </div>
    </div>
     <?php

        $select = new CrudAutopsia();
        $dados  = $select->select();
        foreach ($dados as $key => $value) {

            # MODAL PARA ELIMINAR O CURSO
            echo '
                <div class="modal fade" id="delete'.$value->getId().'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">'.$value->getNome().'</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Tens certeza que deseja eliminar este funcionario ?</div>
                        <div class="modal-footer">
                            <form action="deletar_registro.php" method="post">
                                <input type="hidden" name="id" value="'.$value->getIdautopsia().'">
                                
                                <button type="submit" class="btn btn-danger" name="delete">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
            ';

          
        }
?>



         
                  

<!-- CREATE view view_autopsia
as
SELECT c.*, aut.id_sala_autopsia,aut.obs,aut.data FROM `autopsia` aut INNER JOIN cadaver c ON c.id_cadaver=aut.id_cadaver -->



<?php  include('../includes/footer-sub.php');?>