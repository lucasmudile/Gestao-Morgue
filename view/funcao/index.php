
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
                                <h1 class="h4 text-gray-900 mb-4">Cadastrar Função</h1>
                            </div>
                            <form class="user" method="POST">

                            
                            	<hr>
                                <div class="form-group row">

                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nome_"
                                            placeholder="Função" name="nome_" required>
                                    </div>
                  
                 
                                </div>

                              

                                <input type="submit" class="btn btn-primary btn-user " name="guardar" value="Cadastrar">
                                <hr>
                               
                            </form>


                            <?php   

                                 include('../../model/funcao.php');
                                 include('../../controller/crud-funcao.php');
                                      $funcao=new Funcao();
                                      if (isset($_POST['guardar'])) {
                                          $funcao->setDescricao($_POST['nome_']);
                                          $insert = new CrudFuncao();
                                          $insert->insert($funcao);
                                      }
    
                       ?>
                           
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

         
                  












<?php  include('../includes/footer-sub.php');?>