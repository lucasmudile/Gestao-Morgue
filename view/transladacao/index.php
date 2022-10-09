   
<?php  
include('../includes/header-sub.php');
include_once('../../controller/crud-transladacao.php');
include_once('../../model/transladacao.php');

?>
 <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="app.js"></script>
 



   <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-12">
                        <div class="p-5">
                          
                                <h1 class="h4 text-gray-900 mb-4">Transladação</h1>
                     
                            <form class="user" id="" method="POST">

                              <hr>
                                <div class="form-group row">


                                      <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label class="text-gray-900">Falecido</label>
                                         <select style="border-radius: 30px;height: 50px;" id="idcadaver" name="idcadaver" class="form-control">
                                       <?php
                                                  include_once('../../controller/crud-autopsia.php');  
                                                     $select = new CrudAutopsia();
                                                     $select->cadaverId();
                                                ?>
                                    </select>

                                    </div>
                                   
                                         <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label class="text-gray-900">Proveniencia</label>
                                        <select style="border-radius: 30px;height: 50px;" id="proveniencia" name="proveniencia" class="form-control">
                                       <?php
                                   
                                                     $select = new CrudTransladacao();
                                                     $select->Hospital();
                                                ?>
                                    </select>

                                    </div>

                                     <div class="col-sm-4">
                                        <label class="text-gray-900">Destino</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="destino" name="destino" placeholder="Destino">
                                    </div>

                                </div>

                                <input type="submit" class="btn btn-primary btn-user btn-md" name="salvar" id="salvar" value="Cadastrar" >

                                
                                <hr>



                           <!--  -->
                               
                            </form>


                            <?php
                              if (isset($_REQUEST['salvar'])){

                                $crud = new CrudTransladacao();
                                $model = new Transladacao();
                                $model->setIdCadaver($_REQUEST['idcadaver']);
                                $model->setIdProveniencia($_REQUEST['proveniencia']);
                                $model->setDestino($_REQUEST['destino']);

                               $crud->insert($model);
                              }

                              ?>


                           
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
                  


    <script src="api.js"></script>

    <?php  include('../includes/footer-sub.php');?>

<!--        -->


                                   <!-- <label class="text-gray-900">Local de Proveniencia do cadaver</label> -->