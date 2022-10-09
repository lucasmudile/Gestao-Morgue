<?php

 

    include_once('../../model/usuario.php');
    include_once('../../controller/crud-usuario.php');

    
     $id = $_GET['id'];


    if($id != null) {

        $selectFuncionario = new CrudUsuario();
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
                                <h1 class="h4 text-gray-900 mb-4">Editar Statu do(a) Usuário(a):<?php echo $funcionario->getNome(); ?>  </h1>

                            </div>
                            
                            <form class="user" method="POST" id="form">

                            
                            	<hr>
                                <div class="form-group row">

                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                
                                   <label class="text-gray-900">Statu</label>
                                         <select style="border-radius: 30px;height: 50px;" class="form-control" id="statu" name="statu">
                                      <option  value="Activo">Activo</option>
                                       <option value="Inactivo">Inactivo</option>
                                    </select>


                                    <input type="hidden" class="form-control form-control-user" id="id"
                                            placeholder="Id" name="id" value="<?php echo $funcionario->getId(); ?>" required>
                                    </div>

                                </div>
                              

                                <input type="submit" class="btn btn-primary btn-user " name="editar" value="Editar">
                                <hr>
                               
                            </form>


                            <?php   

                                   include_once('../../model/usuario.php');
                                   include_once('../../controller/crud-usuario.php');
                                          

                                          if(isset($_POST['editar'])) {


                                          $funcionario=new Usuario();
                                          $funcionario->setId($_POST['id']);
                                          $funcionario->setStatu($_POST['statu']);
       

                                          $insert = new CrudUsuario();
                                         $insert->updateSatatu($funcionario);

                                             }

                                          
    
                       ?>
                           
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

        
<?php  include('../includes/footer-sub.php');?>