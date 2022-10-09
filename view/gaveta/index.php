
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
                                <h1 class="h4 text-gray-900 mb-4">Cadastrar Gaveta</h1>
                            </div>
                            <form class="user" method="POST">

                            
                            	<hr>
                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      <label class="text-gray-900">Nº da Gaveta</label>
                                        <input type="text" class="form-control form-control-user" id="nu"
                                            placeholder="Nº" name="nu" required>
                                    </div>
                                    <div class="col-sm-6">
                                      <label class="text-gray-900">Camara</label>
                                         <select style="border-radius: 30px;height: 50px;" id="camara" name="camara" class="form-control">
                                       <?php
                                                    include_once('../../model/camara.php');
                                                    include_once('../../controller/crud-camara.php');
                                                     $select = new CrudCamara();
                                                     $select->options();
                                                ?>
                                    </select>
                                    </div>

                                     
                                </div>
                            
   

                              

                                <input type="submit" class="btn btn-primary btn-user " name="guardar" value="Cadastrar">
                                <hr>
                               
                            </form>


                            <?php   

                                include('../../model/gaveta.php');
                                 include('../../controller/crud-gaveta.php');
        
                                      
                                      $gaveta=new Gaveta();
                                      
                                       
                                      if (isset($_POST['guardar'])) {

                                          $gaveta->setNumero($_POST['nu']);
                                          $gaveta->setIdCamara($_POST['camara']);
                                          $insert = new CrudGaveta();
                                          $insert->insert($gaveta);
                                       

                                      }
    
                       ?>
                           
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

         
                  












<?php  include('../includes/footer-sub.php');?>