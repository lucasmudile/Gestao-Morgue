<?php

 

    include_once('../../model/funcao.php');
    include_once('../../controller/crud-funcao.php');

    
     $id = $_GET['id'];


    if($id != null) {

        $selectFuncao = new CrudFuncao();
        $funcao  = $selectFuncao->getById($id);
        if($funcao->getId() == null) {
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
                                <h1 class="h4 text-gray-900 mb-4">Editar Função</h1>
                            </div>
                            <form class="user" method="POST" id="form">

                            
                            	<hr>
                                <div class="form-group row">

                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                      <label class="text-gray-900">Função</label>
                                        <input type="text" class="form-control form-control-user" id="nome_"
                                            placeholder="Nome Completo" name="nome_" value="<?php echo $funcao->getDescricao(); ?>" >



                                    <input type="hidden" class="form-control form-control-user" id="id"
                                            placeholder="Id" name="id" value="<?php echo $funcao->getId(); ?>" required>
                                    </div>
                                  
                                </div>
    
                              

                                <input type="submit" class="btn btn-primary btn-user " name="editar" value="Editar">
                                <hr>
                               
                            </form>


                            <?php   

                                   include_once('../../model/funcionario.php');
                                   include_once('../../controller/crud-funcionario.php');
                                          

                                          if(isset($_POST['editar'])) {


                                            if(empty($_POST['nome_']) || empty($_POST['nome_'])) {
                                                echo '<div class="alert alert-danger mt-5 alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  <span class="sr-only">Close</span>
                                                </button>
                                                   <h4 class="alert-heading">Preencha todos os campos.</h4>
                                                </div>';
                                             } else {


                                          $funcao=new Funcao();
                                          $funcao->setId($_POST['id']);
                                          $funcao->setDescricao($_POST['nome_']);

                                          $insert = new CrudFuncao();
                                          $insert->update($funcao);

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