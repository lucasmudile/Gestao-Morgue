
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
                                <h1 class="h4 text-gray-900 mb-4">Cadastrar Usuário</h1>
                            </div>
                            <form class="user" method="POST">

                            	
                            	<hr>
                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="text-gray-900">Usuário</label>
                                        <input type="text" class="form-control form-control-user" name="usuario1" id="usuario1"
                                            placeholder=" Usuário" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-gray-900">Senha</label>
                                        <input type="password" class="form-control form-control-user" name="senha" id="senha"
                                            placeholder="Senha" required>
                                    </div>

                                

                                </div>
                            
                                <div class="form-group row">
                                    
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label class="text-gray-900">Funcionário</label>
                                     <select class="form-control" style="border-radius: 30px;height: 50px;" name="funcionario" id="funcionario">
                                 
                                      <?php
                                                    include_once('../../model/funcionario.php');
                                                    include_once('../../controller/crud-funcionario.php');
                                                     $select = new CrudFuncionario();
                                                     $select->options();
                                                ?>
                                    </select>

                                    </div>
                                
                                      <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="text-gray-900">Nível de Acesso</label>
                                      <select class="form-control" style="border-radius: 30px;height: 50px;" name="permicao" id="permicao">
                                 
                                      <?php
                                                    include_once('../../model/permicao.php');
                                                    include_once('../../controller/crud-permicao.php');
                                                     $select = new CrudPermicao();
                                                     $select->options();
                                                ?>
                                    </select>

                                    </div>
                                    
                                </div>

                                <input type="submit" class="btn btn-primary btn-user btn-md" name="guardar" id="guardar" value="Cadastrar">
                                <hr>
                               
                            </form>



                            <?php   

                                 include('../../model/usuario.php');
                                 include('../../controller/crud-usuario.php');
                                      $user=new Usuario();
                                       
                                      if (isset($_POST['guardar'])) {
                                          $user->setNome($_POST['usuario1']);
                                          $user->setSenha($_POST['senha']);
                                          $user->setFuncionario($_POST['funcionario']);
                                          $user->setPermicao($_POST['permicao']);

                                          $insert = new CrudUsuario();
                                          $insert->insert($user);


                                      }
    
                       ?>
                           
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

         
                  












<?php  include('../includes/footer-sub.php');?>