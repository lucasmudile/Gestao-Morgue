   
<?php  
include('../includes/header-sub.php');
include_once('../../controller/crud-transladacao.php');
include_once('../../model/transladacao.php');
// $model = new Transferenca();

?>
 <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="app.js"></script>
 

  <div class="container">


    <div class="row mx-1">
      <form class="form-inline mr-auto  my-3 my-md-0 mw-100 navbar-search" method="GET">
                                
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 shadow-lg"
                                            placeholder="Pesquisar por..." aria-label="Search"
                                            aria-describedby="basic-addon2" value="<?php echo isset($_GET['search'])? $_GET['search'] : ""?>" name="search" >



                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>

                                  <!-- Page Heading -->
                   
          </form>


                        <a href="../../util/relatorio/relatorio-candidato.php" class="ml-auto btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatório</a>

                    </div>



    <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>

                    <div class="col-lg-12">
                      <div class="p-2">
                       <h1 class="h4 text-gray-900 mb-4">Transladação</h1>
                     </div>
                     <table class="table table-striped">
    <thead>
        <tr>
           
            <th scope="col">Nome</th>
            <th scope="col">Origem</th>
            <th scope="col">Destino</th>
            <th scope="col">Data</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
          <?php

          $select = new CrudTransladacao();
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
                                
                                    <td>'.$value->getIdCadaver().'</td>
                                    <td>'.$value->getIdProveniencia().'</td>
                                     <td>'.$value->getDestino().'</td>
                                      <td>'.$value->getData().' </td>

                                      <td>
                                        <a href="editar.php?id='.$value->getId().'" class="btn btn-outline-secondary"><i class="fas fa-pen"></i></a>
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

<!--        -->



<?php

        $select = new CrudTransladacao();
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
                        <div class="modal-body">Tens certeza que deseja eliminar este funcionario ?</div>
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
