
<?php  include('../includes/header-sub.php');?>


  <div class="container">




        <div class="card o-hidden border-0 shadow-lg my-5">






            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-12">
                        <div class="p-5">
                          
                                <h1 class="h4 text-gray-900 mb-4">Levantamento de Corpo</h1>

                
                                <form class="user" >

                                <hr>
                                <div class="form-group row">

                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="pesq" name="pesq" 
                                            placeholder="Id" value="<?php echo isset($_GET['pesq'])? $_GET['pesq'] : ""?>">
                                    </div>
                                    </div>
                                    
                                    
                                    
                                </form>
                                <hr>


                            <?php 

                            if ((isset($_GET['pesq']))&&(($_GET['pesq'])!=null)) {
                                

                                 include_once('../../model/cadaver.php');
                                                include_once('../../controller/crud-cadaver.php');
                                                $select = new CrudCadaver();
                                                $dados;

                                                 $search = $_GET['pesq'];

                                                $dados = $select->pesquisar($search);


                                                if ($dados!=null) {
                                                
                                                foreach ($dados as $key => $value) {

                                                   echo '

                             <div class="row">


                            <div class="col-4">
                                <p class="text-gray-900"><strong>Nome Completo:</strong> '.$value->getNome().'</p>
                              
                                </div>

                                <div class="col-4">

                                     <p class="text-gray-900"> <strong> Sexo: </strong>'.$value->getSexo().' </p>
                              

                                </div>

                                 <div class="col-4">

                                     <p class="text-gray-900"><strong>Residente:</strong> '.$value->getResidente().' </p>
                              

                                </div>
                          </div>


                              <div class="row">


                            <div class="col-4">
                                <p class="text-gray-900"><strong>Nome do Pai:</strong> '.$value->getNomePai().'</p>
                              
                                </div>

                                <div class="col-4">

                                     <p class="text-gray-900"> <strong> Nome da Mãe: </strong>'.$value->getNomeMae().' </p>
                              

                                </div>

                                 <div class="col-4">

                                     <p class="text-gray-900"><strong>Gaveta:</strong> '.$value->getIdGaveta().' </p>
                              

                                </div>
                          </div>



                          <div class="row">


                            <div class="col-4">
                                <p class="text-gray-900"><strong>Camara:</strong> '.$value->getIdCamara().'</p>
                              
                                </div>

                                <div class="col-4">

                                     <p class="text-gray-900"> <strong>Responsável Familiar: </strong>'.$value->getTestemunhaFamiliar().' </p>
                              

                                </div>

                                 <div class="col-4">

                                     <p class="text-gray-900"><strong>Contacto Resp.Familiar:</strong> '.$value->getContacto().' </p>
                              

                                </div>
                          </div>


                            <div class="row">


                            <div class="col-4">
                                <p class="text-gray-900"><strong>Data de Registo:</strong> '.$value->getDataRegisto().'</p>

                              
                                </div>
                          </div>




                            <form class="user">

                                <hr>
                                <div class="form-group row">


                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                     <label class="text-gray-900">Testemunha Familiar</label>
                                        <input type="text" class="form-control form-control-user" name="testemunha" id="testemunha"
                                            placeholder="Testemunha Familiar" required>

                                            <input type="hidden" class="form-control form-control-user" name="id_cadaver" id="id_cadaver"
                                            placeholder="Id" value="'.$value->getId().'">
                                    </div>
                                   

                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                     <label class="text-gray-900">Garu Parentesco</label>
                                        <select style="border-radius: 30px;height: 50px;" id="grau_parentesco" name="grau_parentesco" class="form-control">';

                                      
                                                    include_once('../../model/grau_parentesco.php');
                                                    include_once('../../controller/crud-grau_parentesco.php');
                                                     $select = new CrudGrauParentesco();
                                                     $select->options();
                                                ?>
                                    </select>
                                    </div>




                            <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label class="text-gray-900">Contacto</label>
                <input type="text" class="form-control form-control-user"
                               id="contacto" name="contacto" placeholder="Contacto" required>
                                    </div>
                                 
                                </div>
                            
        

                                      

                                <input type="submit" class="btn btn-primary btn-user btn-md" name="salvar" value="Cadastrar">
                                <hr>
                               
                            </form> <?php
                                                }

                                            }else{

                                              
                                                echo " <p class='text-danger'> Dados não encontrados</p>";
                                            }

                              }
                           
                          ?>

                          <?php 

                            if (isset($_REQUEST['salvar'])) {

                                 include_once('../../model/levantamento.php');
                                 include_once('../../controller/crud-levantamento.php');

                                 //Cadastrar o levantamento de corpo
                                 $levantamento=new Levantamento();
                                 
                                
                                $levantamento->setIdGrauParentesco($_REQUEST['grau_parentesco']);
                                $levantamento->setTestemunhaFamiliar($_REQUEST['testemunha']);
                                $levantamento->setContacto($_REQUEST['contacto']);
                                $levantamento->setIdCadaver($_REQUEST['id_cadaver']);


                                $insert=new CrudLevantamento();
                                $insert->insert($levantamento);


                                //Actualizar o statu da tabela cadaver de depositado para levantado
                                 $update=new Levantamento();

                                 $update->setIdCadaver($_REQUEST['id_cadaver']);

                                $Actualizar=new CrudLevantamento();
                                $Actualizar->getByIdUpdate($update);

                                

                                

                                
                            }



                          ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>






<?php  include('../includes/footer-sub.php');?>