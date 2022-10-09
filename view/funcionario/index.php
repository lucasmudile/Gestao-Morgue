
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
                                <h1 class="h4 text-gray-900 mb-4">Cadastrar Funcionário</h1>
                            </div>
                            <form class="user" method="POST">

                            
                            	<hr>
                                <div class="form-group row">

                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nome_"
                                            placeholder="Nome Completo" name="nome_" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user" id="n_bilhete" name="n_bilhete" 
                                            placeholder="Nº de Bilhete" required>
                                    </div>

                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="morada" name="morada" placeholder="Morada" required>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user"
                                            id="telefone" name="telefone" placeholder="Telefone" required>
                                    </div>
                                     <div class="col-sm-4 mb-3 mb-sm-0">
                                         <select style="border-radius: 30px;height: 50px;" class="form-control" id="sexo" name="sexo">
                                      <option value="Masculino">Masculino</option>
                                       <option value="Femenino">Femenino</option>
                                    </select>
                                    </div>
                                     <div class="col-sm-4 mb-3 mb-sm-0">
                                    
                                    <select style="border-radius: 30px;height: 50px;" id="funcao" name="funcao" class="form-control">
                                       <?php
                                                    include_once('../../model/funcao.php');
                                                    include_once('../../controller/crud-funcao.php');
                                                     $select = new CrudFuncao();
                                                     $select->options();
                                                ?>
                                    </select>
                                    </div>
                                    
                                </div>

                              

                                <input type="submit" class="btn btn-primary btn-user " name="guardar" value="Cadastrar">
                                <hr>
                               
                            </form>


                            <?php   

                                include('../../model/funcionario.php');
                                 include('../../controller/crud-funcionario.php');
        
                                      
                                      $funcionario=new Funcionario();
                                      
                                       
                                      if (isset($_POST['guardar'])) {
                                          
                                            
                                              $nome = $_POST['nome_'];
                                          
                                          $n_bilhete=$_POST['n_bilhete'];
                                          $morada=$_POST['morada'];
                                          $telefone=$_POST['telefone'];
                                          $sexo=$_POST['sexo'];
                                          $funcao=$_POST['funcao'];


                                          $funcionario->setNome($nome);
                                          $funcionario->setBi($n_bilhete);
                                          $funcionario->setMorada($morada);
                                          $funcionario->setTelefone($telefone);
                                          $funcionario->setSexo($sexo);
                                          $funcionario->setFuncao($funcao);
                                          $funcionario->setDataCadastro(date('Y-m-d'));
                                          $funcionario->setDataActualizacao(date('Y-m-d'));

                                          $insert = new CrudFuncionario();
                                          $insert->insert($funcionario);

                                        

                                       


                                      }
    
                       ?>
                           
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

         
                  












<?php  include('../includes/footer-sub.php');?>