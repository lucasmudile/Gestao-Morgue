<?php

 

    include_once('../../model/camara.php');
    include_once('../../controller/crud-camara.php');

    
     $id = $_GET['id'];


    if($id != null) {

        $selectCamara = new CrudCamara();
        $camara  = $selectCamara->getById($id);
        if($camara->getId() == null) {
            header('Location: ../index.php');
        }

    } else {
        header('Location: ../index.php');
    }
    



?>


<?php  include('../includes/header-sub.php');?>


  <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="">
                                <h1 class="h4 text-gray-900 mb-4">Editar Camara</h1>
                            </div>
                            <form class="user" method="POST" id="form">

                            
                            	<hr>
                                <div class="form-group row">

                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                      <label class="text-gray-900">Referência</label>
                                        <input type="text" class="form-control form-control-user" id="referencia"
                                            placeholder="Nome Completo" name="referencia" value="<?php echo $camara->getReferencia(); ?>" >



                                    <input type="hidden" class="form-control form-control-user" id="id"
                                            placeholder="Id" name="id" value="<?php echo $camara->getId(); ?>" required>
                                    </div>
                                    <div class="col-sm-4">
                                      <label class="text-gray-900">Nº Total de Gaveta</label>
                                        <input type="text" class="form-control form-control-user" id="total" name="total" 
                                            placeholder="Nº de Bilhete" value="<?php echo $camara->getN_GavetaTotal(); ?>" required>
                                    </div>

                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                      <label class="text-gray-900">Nº de Gaveta Ocupado</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="ocupada" name="ocupada" placeholder="Morada" value="<?php echo $camara->getN_GavetaOcupada(); ?>" required>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary btn-user " name="editar" value="Editar">
                                <hr>
                               
                            </form>


                            <?php   

                                   include_once('../../model/funcionario.php');
                                   include_once('../../controller/crud-funcionario.php');
                                          

                                          if(isset($_POST['editar'])) {


                                            if(empty($_POST['referencia']) || empty($_POST['referencia'])) {
                                                echo '<div class="alert alert-danger mt-5 alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  <span class="sr-only">Close</span>
                                                </button>
                                                   <h4 class="alert-heading">Preencha todos os campos.</h4>
                                                </div>';
                                             } else {

                                          $camara=new Camara();
                                          $camara->setId($_POST['id']);
                                          $camara->setReferencia($_POST['referencia']);
                                          $camara->setN_GavetaTotal($_POST['total']);
                                          $camara->setN_GavetaOcupada($_POST['ocupada']);


                                          $insert = new CrudCamara();
                                         $insert->update($camara);

                                       

                                             }
                                              // header('Location: ver_camara.php');

                                          }
    
                       ?>
                           
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

        
<?php  include('../includes/footer-sub.php');?>