   
<?php  
include('../includes/header-sub.php');
include_once('../../controller/crud-transferenca.php');
$crud = new CrudTransferenca();
// $model = new Transferenca();

?>
 <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="app.js"></script>
 

  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>

                    <div class="col-lg-12">
                      <div class="p-5">
                       <h1 class="h4 text-gray-900 mb-4">Tranferencias</h1>
                     </div>
                     <table class="table table-striped">
    <thead>
        <tr>
           
            <th scope="col">Nome</th>
            <th scope="col">Camara origem</th>
            <th scope="col">Camara destino</th>
            <th scope="col">Gaveta origem</th>
            <th scope="col">Gaveta destino</th>
            <th scope="col">Data</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
          <?php

          $select = new CrudTransferenca();
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
// getId
// getIdCadaver
// getNome
// getIdGaveta
// getGaveta
// getIdCamara
// getCamara
                        foreach ($dados as $key => $value) {
                           echo '<tr>
                                
                                    <td>'.$value->getNome().'</td>
                                    <td>'.$value->getIdCamara().'</td>
                                     <td>'.$value->getCamara().'</td>
                                      <td>'.$value->getIdGaveta().'</td>
                                      <td>'.$value->getGaveta().' </td>
                                      <td>'.$value->getData().'</td>

                                      <td>
                                        <a href="editar.php?id='.$value->getIdCadaver().'" class="btn btn-outline-secondary"><i class="fas fa-pen"></i></a>
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
    <script src="api.js"></script>

    <?php  include('../includes/footer-sub.php');?>



<?php

        $select = new CrudTransferenca();
        $dados  = $select->select();
        foreach ($dados as $key => $value) {

            # MODAL PARA ELIMINAR O CURSO
            echo '
                <div class="modal fade" id="delete'.$value->getId().'" tabindex="-1" role="dialog" aria-labelledby="modal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal">'.$value->getIdCadaver().'</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Tens certeza que deseja eliminar este funcionario '.$value->getId().'?</div>
                        <div class="modal-footer">
                            <form action="excluir.php" method="post">
                                <input type="hidden" name="id" value="'.$value->getId().'">
                                
                                <button type="submit" class="btn btn-danger" name="delete">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
            ';

          
        }
?>
