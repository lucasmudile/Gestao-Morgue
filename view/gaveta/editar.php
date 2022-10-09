<?php

 

    include_once('../../model/gaveta.php');
    include_once('../../controller/crud-gaveta.php');

    
     $id = $_GET['id'];


    if($id != null) {

        $selectFuncionario = new CrudGaveta();
        $funcionario  = $selectFuncionario->getById($id);
        if($funcionario->getId() == null) {
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
                                <h1 class="h4 text-gray-900 mb-4">Editar Gaveta</h1>
                            </div>
                            <form class="user" method="POST" id="form">

                            
                            	<hr>
                                <div class="form-group row">

                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                      <label class="text-gray-900">Gaveta Nº</label>
                                        <input type="text" class="form-control form-control-user" id="numero"
                                            placeholder="Nome Completo" name="numero" value="<?php echo $funcionario->getNumero(); ?>" >



                                    <input type="hidden" class="form-control form-control-user" id="id"
                                            placeholder="Id" name="id" value="<?php echo $funcionario->getId(); ?>" required>
                                    </div>
                                   


                                       <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label class="text-gray-900">Camara</label>
                                    <select style="border-radius: 30px;height: 50px;" id="camara" value="<?php echo $funcionario->getIdCamara(); ?>" name="camara" class="form-control">
                                       <?php
                                                    include_once('../../model/camara.php');
                                                    include_once('../../controller/crud-camara.php');
                                                     $select = new CrudCamara();
                                                     $select->options();
                                                ?>
                                    </select>
                                    </div>

         
                                </div>
                            
                                <div class="form-group row">
             
                                    
                                  
                                    
                                </div>

                              

                                <input type="submit" class="btn btn-primary btn-user " name="editar" value="Editar">
                                <hr>
                               
                            </form>


                            <?php   

                                   include_once('../../model/funcionario.php');
                                   include_once('../../controller/crud-funcionario.php');
                                          

                                          if(isset($_POST['editar'])) {


                                            if(empty($_POST['numero']) || empty($_POST['numero'])) {
                                                echo '<div class="alert alert-danger mt-5 alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  <span class="sr-only">Close</span>
                                                </button>
                                                   <h4 class="alert-heading">Preencha todos os campos.</h4>
                                                </div>';
                                             } else {
  
                                          $funcionario=new Gaveta();
                                          $funcionario->setId($_POST['id']);
                                          $funcionario->setNumero($_POST['numero']);
                                          $funcionario->setIdCamara($_POST['camara']);

                                          $insert = new CrudGaveta();
                                         $insert->update($funcionario);

                                             }

                                          }
    
                       ?>
                           
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

        
<?php  include('../includes/footer-sub.php');?>