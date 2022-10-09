
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
                                <h1 class="h4 text-gray-900 mb-4">Tranferença</h1>
                            </div> 
                        </div>

                    </div>
                    <div class="col-lg-12">

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